<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if (auth()->check()) {
            $email = 'unique:users,email,'.auth()->id();
            $phone = 'unique:users,phone,'.auth()->id();
            $pass = 'nullable';
        } else {
            $email = 'unique:users,email';
            $phone = 'unique:users,phone';
            $pass = 'required';
        }

        return [
            'course' => 'required|string|exists:courses,slug',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'email' => 'required|string|email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|'.$email,
            'phone' => 'required|string|'.$phone,
            'password' => $pass.'|string|min:8|confirmed',

            'card_name' => 'required|string|max:255',
            'card_number' => 'required|string|max:255',
            'cvc' => 'required|integer',
            'expiry_month' => 'required|date_format:d',
            'expiry_year' => 'required|date_format:Y',
        ];
    }
}
