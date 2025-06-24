<?php

namespace App\Http\Requests\Staff;

use App\Models\MembershipPlan;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MembershipPlanRequest extends FormRequest
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
            'name' => ['required','string','max:255',Rule::unique(MembershipPlan::class)->ignore($this->route('membership_plan')?->id)],
            'title' => ['required','string','max:255'],
            'monthly_price' => ['required','numeric'],
            'yearly_price' => ['required','numeric'],
            'description' => ['required','string'],
        ];
    }
}
