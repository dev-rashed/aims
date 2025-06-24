<?php

namespace Database\Seeders;

use App\Models\MembershipPlan;
use Illuminate\Database\Seeder;

class MembershipPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $plans = ['Accredited Member', 'Registered member', 'Associate member', 'Student member'];
        foreach ($plans as $plan) {
            MembershipPlan::create([
                'name' => $plan,
                'slug' => generateSlug($plan),
                'title' => fake()->sentence(),
                'monthly_price' => rand(100, 2000),
                'yearly_price' => rand(100, 2000),
                'description' => fake()->realText(),
            ]);
        }
    }
}
