<?php

namespace App\Http\Requests\Staff;

use App\Models\Staff;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StaffRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:50', Rule::unique(Staff::class)->ignore($this->route('staff')?->id)],
            'phone' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable'], imageFileValidationRule(),
            'password' => [$this->isMethod('POST') ? 'required' : 'nullable', 'confirmed', 'min:8'],
        ];
    }
}
