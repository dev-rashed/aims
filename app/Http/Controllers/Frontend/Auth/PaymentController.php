<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        $payments = Payment::query()->with('order:id,invoice')->where('user_id', auth()->id())->latest()->paginate();

        return view('user.payment.index', compact('payments'));
    }

    /**
     * Handle the incoming request.
     */
    public function create()
    {
        if (gettype(nextPayment()) != 'string') {
            return back();
        }
        return view('user.payment.form');
    }

    /**
     * Checkout a new payment
     */
    public function store(Request $request)
    {
        try {
            $amount = paymentAmount();
            $stripe_token = $request->input('stripe_token');
            $stripeToken  = gettype($stripe_token) == 'string' ? json_decode($stripe_token) : $stripe_token;
            $token_id = gettype($stripeToken) == 'array' ? $stripeToken['id'] : $stripeToken->id;
            $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));

            $currency_code = DB::table('currencies')->where('id', setting('currency_symbol'))->value('code') ?? 'GBP';

            $charge = $stripe->charges->create([
                'amount' => $amount * 100,
                'currency' => strtolower($currency_code),
                'source' => $token_id,
                'receipt_email' => auth()->user()->email,
            ]);

            Payment::query()->create([
                'user_id' => auth()->id(),
                'subtotal' => $amount,
                'discount' => 0,
                'total' => $amount,
                'method' => Payment::METHOD[0],
                'for' => Payment::FOR_ORDER,
                'btc_wallet' => $charge?->balance_transaction,
                'trx' => getTrx(),
                'status' => 'success'
            ]);
        } catch (Exception $e) {
            throw new Exception(storeExceptionLog($e));
        }

        return response()->json(['message' => 'Payment successfull']);
    }
}
