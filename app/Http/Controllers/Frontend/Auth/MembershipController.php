<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\MembershipUpdateRequest;
use App\Mail\RenewMail;
use App\Models\MembershipPlan;
use App\Models\Renew;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MembershipController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        if (auth()->user()->therapist?->status == 'approved') {
            $renews = Renew::query()->with('membership')->latest()->paginate();

            return view('user.membership.index', compact('renews'));
        }

        return back();
    }

    /**
     * Display a listing of the renew page
     */
    public function created($type)
    {
        $membershipPlans = MembershipPlan::query()->orderBy('name')->get();

        return view('user.membership.form', compact('membershipPlans', 'type'));
    }

    /**
     * Checkout a new membership plan
     */
    public function store(MembershipUpdateRequest $request)
    {
        $membershipPlanId = DB::table('membership_plans')->where('slug', $request->membership_plan)->value('id');

        $renew = Renew::query()->create([
            'membership_id' => $membershipPlanId,
            'user_id' => auth()->id(),
            'type' => $request->type,
            'membership_type' => $request->membership_type,
            'note' => $request->note,
        ]);

        Mail::to($request->user()->email)->send(new RenewMail($renew));

        return response()->json(['message' => 'Your information send to admin']);
    }

    public function edit()
    {
        $membershipPlans = MembershipPlan::query()->orderBy('name')->get();

        return view('frontend.auth.membership.form', compact('membershipPlans'));
    }
}
