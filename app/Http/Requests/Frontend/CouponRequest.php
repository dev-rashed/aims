<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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
            'from' => 'required|string|in:course,event,membership',
            'membership_plan' => 'nullable|required_if:from,membership|string|exists:membership_plans,slug',
            'membership_type' => 'nullable|required_if:from,membership|string|in:monthly,yearly',
            'course' => 'nullable|required_if:from,course|string|exists:courses,slug',
            'event' => 'nullable|required_if:from,event|string|exists:events,slug',
            'code' => 'required|string',
        ];
    }
}
