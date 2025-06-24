<?php

namespace App\Http\Requests\Staff;

use Illuminate\Foundation\Http\FormRequest;

class CounsellorRequest extends FormRequest
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
        return [
            'first_name' => ['required','string','max:255'],
            'last_name' => ['required','string','max:255'],
            'designation' => ['required','string','max:255'],
            'email' => ['required','string','email','max:255'],
            'phone' => ['required','string','max:255'],
            'image' => array_merge(['nullable'], imageFileValidationRule(true)),
        ];
    }
}
