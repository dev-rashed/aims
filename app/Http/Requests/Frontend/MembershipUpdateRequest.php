<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class MembershipUpdateRequest extends FormRequest
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
            'membership_plan' => ['required', 'string', 'exists:membership_plans,slug'],
            'type' => ['required', 'in:renew,upgrade,cancel'],
            'membership_type' => ['required', 'string', 'in:monthly,yearly'],
            'note' => ['nullable', 'string'],
        ];
    }
}
