<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\EventRequest;
use App\Models\Booking;
use App\Models\Event;
use App\Models\Payment;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    /**
     * Display a listing of the education page
     */
    public function index()
    {
        $event = Event::where('date', '>=', date('Y-m-d'))->latest('id')->first();
        $events = Event::where('date', '>=', date('Y-m-d'))->latest('id')->get();

        return view('frontend.event.index', compact('event', 'events'));
    }

    /**
     * Display the specified resource.
     */
    public function details($slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();
        $events = Event::whereNot('id', $event->id)->latest('id')->get();

        return view('frontend.event.details', compact('event', 'events'));
    }

    /**
     * Display the specified resource.
     */
    public function booking($slug)
    {
        session()->forget('coupon');
        $event = Event::with('counsellor:id,first_name,last_name,image')->where('slug', $slug)->firstOrFail();

        return view('frontend.event.checkout', compact('event'));
    }

    /**
     * checkout a new course
     */
    public function checkout(EventRequest $request)
    {
        try {
            $stripeEnable = config('services.stripe.enable');

            $coupon = session()->has('coupon') ? session()->get('coupon') : null;
            $event = Event::where('slug', $request->event)->first(['id', 'price']);

            $total = ((int) $event->price) - ($coupon['discount'] ?? 0);

            if ($stripeEnable && $total > 0) {
                $stripe_token = $request->input('stripe_token');
                $stripeToken  = gettype($stripe_token) == 'string' ? json_decode($stripe_token) : $stripe_token;
                $token_id = gettype($stripeToken) == 'array' ? $stripeToken['id'] : $stripeToken->id;
                $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));

                try {
                    $currency = session()->get('currency');
                    $amount = currencyConvert(amount: $total, to: $currency->code);
                    $stripe->charges->create([
                        'amount' => $amount * 100,
                        'currency' => strtolower($currency->code),
                        'source' => $token_id,
                        'receipt_email' => $request->email,
                    ]);
                } catch (Exception $e) {
                    throw new Exception(storeExceptionLog($e));
                }
            }

            $user = auth()->user();

            if (! $user) {
                $username = generateSlug("$request->first_name $request->last_name");
                if (User::where('username', $username)->first()) {
                    $username .= rand();
                }

                $user = User::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'username' => $username,
                    'password' => bcrypt(rand()),
                ]);
            }

            $booking = Booking::create([
                'event_id' => $event->id,
                'user_id' => $user->id,
                'subtotal' => $total,
                'discount' => $coupon['discount'] ?? 0,
                'total' => $total,
                'address' => $request->address,
            ]);

            $data = [
                'from' => Payment::FOR_BOOKING,
                'subtotal' => $event->price,
                'discount' => $coupon['discount'] ?? 0,
                'total' => $total,
            ];

            $res = CheckoutController::successCheckout($booking, $user, $data);

            DB::commit();

            return $res;

        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception(storeExceptionLog($e));
        }

    }
}
