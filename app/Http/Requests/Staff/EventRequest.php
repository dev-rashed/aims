<?php

namespace App\Http\Requests\Staff;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'counsellor' => 'nullable|integer|exists:counsellors,id',
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'location' => 'required|string|max:255',
            'date' => 'required|date|after:today',
            'time' => 'required|date_format:H:i',
            'short_description' => 'required|string',
            'description' => 'nullable|string',
            'tags' => 'nullable|string',
            'image' => $this->isMethod('POST') ? 'required' : 'nullable'.imageFileValidationRule(),
        ];
    }
}
