<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Rules\RecaptchaRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact');
    }

    /**
     * store
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'details' => ['nullable', 'string'],
            'g-recaptcha-response' => [new RecaptchaRule],
        ]);

        try {
            Mail::to($request->email)->send(new ContactMail);

            return response()->json([
                'message' => 'Your information submitted successfully',
            ]);

        } catch (\Exception $e) {
            throw $e;
        }
    }
}
