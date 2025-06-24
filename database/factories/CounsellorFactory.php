<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Counsellor>
 */
class CounsellorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $designations = ['Couples Counsellor & Supervisor', 'MBACP, MEd, MSc', 'BACP Psychotherapeutic Counsellor', 'MA PGDip, Reg. BACP'];

        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'designation' => $designations[rand(0, 3)],
            'email' => fake()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'image' => 'default.jpg',
        ];
    }
}
