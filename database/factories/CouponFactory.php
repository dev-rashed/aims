<?php

namespace Database\Factories;

use App\Models\Coupon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => 'AIMS'.rand(111, 999999),
            'discount_type' => [Coupon::DISCOUNT_TYPE_FIXED, Coupon::DISCOUNT_TYPE_PERCENTAGE][rand(0, 1)],
            'discount' => rand(1, 200),
            'expire_date' => '2023-'.rand(01, 12).'-'.rand(1, 30),
        ];
    }
}
