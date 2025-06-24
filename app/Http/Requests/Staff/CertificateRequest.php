<?php

namespace App\Http\Requests\Staff;

use Illuminate\Foundation\Http\FormRequest;

class CertificateRequest extends FormRequest
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
        $imageRule = $this->isMethod('POST') ? 'required' : 'nullable'.imageFileValidationRule();

        return [
            'therapist' => 'required|integer|exists:therapists,id',
            'image' => $imageRule,
            'logo' => $imageRule,
        ];
    }
}
