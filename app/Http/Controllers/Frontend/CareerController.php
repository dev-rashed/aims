<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\CareerMail;
use App\Models\Career;
use App\Rules\RecaptchaRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CareerController extends Controller
{
    /**
     * index
     */
    public function index()
    {
        return view('frontend.career');
    }

    /**
     * store
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'details' => ['nullable', 'string'],
            'g-recaptcha-response' => [new RecaptchaRule],
        ]);

        $career = Career::query()->create($validated);

        Mail::to($career->email)->send(new CareerMail($career));
        Mail::to(config('mail.from.address'))->send(new CareerMail($career, true));

        return response()->json([
            'message' => 'Your information submitted successfully',
        ]);
    }
}
