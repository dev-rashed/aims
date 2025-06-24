<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Requests\Frontend\MembershipUpdateRequest;
use App\Models\VideoPayment;

class VideoPaymentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(MembershipUpdateRequest $request)
    {
        $payment = PaymentController::stripe($request, 12);
        if (gettype($payment) !== 'boolean') {
            return response()->json(['message' => $payment], 300);
        }
        VideoPayment::create([
            'user_id' => auth()->id(),
            'amount' => 12,
            'expire_date' => now()->addYear()->format('Y-m-d'),
        ]);

        return response()->json(['message' => 'You are payment successfully for live profile.']);
    }
}
