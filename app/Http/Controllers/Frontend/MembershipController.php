<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\MembershipRequest;
use App\Models\Coupon;
use App\Models\MembershipPlan;
use App\Models\OnlinePlatform;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use App\Rules\LocationRule;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class MembershipController extends Controller
{
    /**
     * Display a listing of the education page
     */
    public function index()
    {
        $membershipPlans = MembershipPlan::get();

        return view('frontend.membership.index', compact('membershipPlans'));
    }

    /**
     * Display a listing of the checkout page
     */
    public function show($slug)
    {
        $membershipPlan = MembershipPlan::where('slug', $slug)->firstOrFail();

        if (request()->ajax()) {
            $session = session()->get('coupon');
            $type = request()->get('type');

            $price = $type == 'monthly' ? $membershipPlan->monthly_price : $membershipPlan->yearly_price;
            if ($session != null && isset($session['code'])) {
                $coupon = Coupon::where('code', $session['code'])->first();

                if ($coupon && $coupon->discount_type == Coupon::DISCOUNT_TYPE_FIXED) {
                    $discount = $coupon->discount;
                } else {
                    $discount = ($coupon->discount / 100) * $price;
                }
            }

            session()->forget('coupon');
            session()->put('coupon', [
                'price' => $price,
                'code' => $coupon->code ?? null,
                'discount' => $discount ?? 0,
            ]);

            return response()->json([
                'coupon' => session()->get('coupon'),
            ]);
        } else {
            $data = new stdClass;
            $data->professions = DB::table('professions')->orderBy('name', 'DESC')->get(['id', 'name', 'slug']);
            $data->sessions = DB::table('sessions')->orderBy('name', 'DESC')->get(['id', 'name', 'slug']);
            $data->concessions = DB::table('concessions')->orderBy('name', 'DESC')->get(['id', 'name', 'slug']);
            $data->languages = DB::table('languages')->orderBy('name', 'DESC')->get(['id', 'name', 'slug']);
            $data->formats = DB::table('formats')->orderBy('name', 'DESC')->get(['id', 'name', 'slug']);

            return view('frontend.membership.checkout', compact('data', 'membershipPlan'));
        }

    }

    /**
     * Checkout a new membership plan
     */
    public function store(MembershipRequest $request)
    {
        try {
            $stripeEnable = config('services.stripe.enable');

            $membership = MembershipPlan::query()->where('slug', $request->membership_plan)->first(['id', 'monthly_price', 'yearly_price']);
            $price = $request->membership_type == 'yearly' ? $membership->yearly_price : $membership->monthly_price;
            $discount = session()->has('coupon') ? session()->get('coupon')['discount'] : 0;
            $total = (float) $price - $discount;

            if ($stripeEnable) {
                if($total > 0) {
                    $stripe_token = $request->input('stripe_token');
                    $stripeToken  = gettype($stripe_token) == 'string' ? json_decode($stripe_token) : $stripe_token;
                    $token_id = gettype($stripeToken) == 'array' ? $stripeToken['id'] : $stripeToken->id;
                    $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));

                    try {
                        $currency = session()->get('currency');
                        $amount = currencyConvert(amount: $total, to: $currency->code);
                        $charge = $stripe->charges->create([
                            'amount' => $amount * 100,
                            'currency' => strtolower($currency->code),
                            'source' => $token_id,
                            'receipt_email' => $request->email,
                        ]);
                    } catch (Exception $e) {
                        throw new Exception(storeExceptionLog($e));
                    }
                }
            }

            $username = generateSlug("$request->first_name $request->last_name");
            if (DB::table('users')->where('username', $username)->exists()) {
                $username .= rand();
            }

            DB::beginTransaction();

            $user = User::query()->create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'location' => $request->location,
                'avatar' => $request->hasFile('image') ? fileUpload($request->image, 'user') : null,
                'username' => $username,
                'account_type' => User::TYPE_PRACTITIONER,
                'password' => bcrypt($request->password),
            ]);

            $input = $request->validated();

            if ($request->has('socials') && ! empty($request->socials)) {
                $online_platforms = [];
                foreach ($request->socials as $key => $social) {
                    $platform = OnlinePlatform::query()->find($social);
                    if ($platform) {
                        $online_platforms[$key] = [
                            'id' => $platform->id,
                            'name' => $platform->name,
                            'url' => $request->urls[$key],
                        ];
                    }
                }
                $input['online_platforms'] = json_encode($online_platforms);
            }

            if ($request->hasFile('documents')) {
                $documents = [];
                foreach ($request->documents as $document) {
                    $uploadedDoc = fileUpload($document, 'user/documents');
                    array_push($documents, $uploadedDoc);
                }
                $input['documents'] = json_encode($documents);
            }

            $input['short_description'] = $request->description;
            $input['degree'] = $request->qualification;
            $location = getLocation($request->location);
            $input['latitude_address'] = $location->lat;
            $input['longitude_address'] = $location->lng;
            $input['membership_id'] = $membership->id;
            $input['membership_type'] = $request->membership_type;

            $therapist = $user->therapist()->create($input);

            $therapist->professions()->sync(DB::table('professions')->whereIn('slug', $request->services ?? [])->pluck('id')->toArray());
            $therapist->sessions()->sync(DB::table('sessions')->whereIn('slug', $request->method ?? [])->pluck('id')->toArray());
            $therapist->formats()->sync(DB::table('formats')->whereIn('slug', $request->formats ?? [])->pluck('id')->toArray());
            $therapist->languages()->sync(DB::table('languages')->whereIn('slug', $request->languages ?? [])->pluck('id')->toArray());
            $therapist->concessions()->sync(DB::table('concessions')->whereIn('slug', $request->concessions ?? [])->pluck('id')->toArray());

            $order = Order::query()->create([
                'membership_plan_id' => $membership->id,
                'user_id' => $user->id,
                'membership_type' => $request->membership_type,
                'subtotal' => $price,
                'discount' => $discount,
                'total' => $total,
            ]);

            $data = [
                'from' => Payment::FOR_ORDER,
                'subtotal' => $price,
                'discount' => 0,
                'total' => $price,
            ];

            $res = CheckoutController::successCheckout($order, $user, $data);

            DB::commit();

            return $res;

        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception(storeExceptionLog($e));
        }
    }

    /**
     * check
     */
    public function check(Request $request)
    {
        $rule = [];
        if (in_array($request->key, ['email', 'phone'])) {
            $rule = ["unique:users,{$request->key}"];
        } else {
            $rule = [new LocationRule()];
        }
        $request->validate([
            'key' => ['required', 'string'],
            'value' => array_merge(['required'], $rule),
        ], [
            'value.unique' => "The {$request->key} has already been taken.",
        ]);

        return 1;
    }
}
