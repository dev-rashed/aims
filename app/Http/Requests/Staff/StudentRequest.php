<?php

namespace App\Http\Requests\Staff;

use App\Models\User;
use App\Rules\LocationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Propaganistas\LaravelPhone\Rules\Phone;

class StudentRequest extends FormRequest
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
        $isNullable = $this->isMethod('POST') ? 'required' : 'nullable';

        $location = $this->filled('location') ? getLocation($this->input('location'), true) : null;
        $countryCode = $location->countryCode ?? 'GB';

        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', Rule::unique(User::class)->ignore($this->route('student'))],
            'phone' => ['required','string', (new Phone)->countryField($countryCode), Rule::unique(User::class)->ignore($this->route('student'))],
            'password' => [$isNullable, 'string', 'min:8', 'confirmed'],
            'location' => ['required', new LocationRule()],
            'avatar' => array_merge([$isNullable], imageFileValidationRule(true)),
        ];
    }
}
