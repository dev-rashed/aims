<?php

namespace App\Http\Requests\Staff;

use App\Models\Coupon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'code' => ['required','string','max:15', Rule::unique(Coupon::class)->ignore($this->route('coupon')?->id)],
            'discount_type' => ['required','string','max:15','in:'.Coupon::DISCOUNT_TYPE_FIXED.','.Coupon::DISCOUNT_TYPE_PERCENTAGE],
            'discount' => ['required','numeric'],
            'expire_date' => ['required','date'],
        ];
    }
}
