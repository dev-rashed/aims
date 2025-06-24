<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\CheckoutConfirmationMail;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    /**
     * successCheckout
     */
    public static function successCheckout(object $model, object $user, array $data, $isPay = true)
    {
        $model->invoice = generateInvoice($model->id);
        $model->save();

        session()->forget('coupon');

        $payment = Payment::query()->create([
            'relation_id' => $model->id,
            'user_id' => $user->id,
            'subtotal' => $data['subtotal'],
            'discount' => $data['discount'],
            'total' => $data['total'],
            'for' => $data['from'],
            'method' => Payment::METHOD[0],
        ]);

        $subject = match($data['from']) {
            Payment::FOR_ENROLL => 'Course enroll successfully, completed.',
            Payment::FOR_BOOKING => 'Event booking successfully, completed.',
            default => 'Your membership application was received.',
        };

        Mail::to($user->email)->send(new CheckoutConfirmationMail($subject, $model, $data['from']));
        if ($data['from'] == Payment::FOR_ORDER) {
            Mail::to(config('mail.from.address'))->send(new CheckoutConfirmationMail('Application for new membership', $model, $data['from'], true));
        }

        $payment->load('user');

        session()->put('payment', $payment);
        if (! auth()->check() && $data['from'] == Payment::FOR_ORDER) {
            Auth::login($user);
        }

        $message = $data['from'] == Payment::FOR_ORDER ? 'Membership Registration Successful!' : translate('payment_confirm');

        return response()->json(['message' => $message]);
    }

    /**
     * checkout confirmation
     */
    public function confirmation()
    {
        if (! session()->has('payment')) {
            return redirect()->to('/');
        }
        $payment = session()->get('payment');
        session()->forget('payment');

        return view('frontend.checkout-confirmation', compact('payment'));
    }
}
