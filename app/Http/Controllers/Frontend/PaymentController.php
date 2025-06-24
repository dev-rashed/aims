<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\CheckoutConfirmationMail;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Stripe;

class PaymentController extends Controller
{
    /**
     * stripe payment
     */
    public static function stripe($request, $amount)
    {
        Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $response = Stripe\Token::create([
                'card' => [
                    'number' => $request->card_number,
                    'exp_month' => $request->expiry_month,
                    'exp_year' => $request->expiry_year,
                    'cvc' => $request->cvc,
                ],
            ]);

            if (! isset($response['id'])) {
                return false;
            }

            $address = [
                'line1' => $request->street_address_1 ?? $request->address,
                'line2' => $request->street_address_2 ?? $request->address,
                'postal_code' => $request->zipcode ?? fake('en_GB')->postcode(),
                'city' => $request->city ?? fake('en_GB')->city(),
                'state' => $request->city ?? fake('en_GB')->city(),
                'country' => $request->country ?? fake('en_GB')->country(),
            ];

            $customer = Stripe\Customer::create([
                'address' => $address,
                'email' => auth()->check() ? auth()->user()->email : $request->email,
                'name' => auth()->check() ? auth()->user()->full_name : "$request->first_name $request->last_name",
                'source' => $response['id'],
            ]);

            Stripe\Charge::create([
                'amount' => round($amount, 2) * 100,
                'currency' => strtolower(session()->get('currency')->code),
                'customer' => $customer->id,
                'description' => 'Test payment from aims',
                'shipping' => [
                    'name' => $customer->name,
                    'address' => $address,
                ],
            ]);

            return true;
        } catch (\Stripe\Exception\CardException $e) {
            return $e->getMessage();
        }

    }

    /**
     * process
     */
    public function process($amount)
    {
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => strtolower(session()->get('currency')->code),
                        'unit_amount' => round($amount, 2) * 100,
                        'product_data' => [
                            'name' => setting('app_name'),
                            'description' => 'Payment  with Stripe',
                            'images' => [uploadedFile(setting('logo'))],
                        ],
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'cancel_url' => route('payment.callback', 'cancel'),
                'success_url' => route('payment.callback', 'success'),
            ]);
        } catch (\Exception $e) {
            $send['error'] = true;
            $send['message'] = $e->getMessage();

            return json_encode($send);
        }

        $send['session'] = $session;

        return json_encode($send);
    }

    /**
     * Payment callback
     */
    public function callback($status)
    {
        if (! session()->has('track')) {
            return redirect()->to('/');
        }

        $payment = Payment::with('user')->where('trx', session()->get('track'))->first();

        $payment->status = $status;
        $payment->save();

        if ($payment->for == Payment::FOR_ORDER) {
            $subject = 'Membership checkout sucssfully';
        } elseif ($payment->for == Payment::FOR_ENROLL) {
            $subject = 'Course enroll sucssfully, completed';
        } elseif ($payment->for == Payment::FOR_BOOKING) {
            $subject = 'Event booking sucssfully, completed';
        }

        Mail::send(new CheckoutConfirmationMail($subject, $payment->order, $payment->for));

        session()->forget('track');
        session()->forget('model');

        session()->put('user', $payment->user);
        // return response()->json(['message' => translate('payment_confirm')]);

        if (! auth()->check()) {
            Auth::loginUsingId($payment->user?->id);
        }

        return to_route('checkout.confirmation');
    }
}
