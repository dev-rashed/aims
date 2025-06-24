<?php

namespace Database\Seeders;

use App\Models\OnlinePlatform;
use Illuminate\Database\Seeder;

class OnlinePlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $socials = ['Facebook', 'Twitter', 'Google', 'Linkedin', 'Instagram'];

        foreach ($socials as $social) {
            OnlinePlatform::create([
                'name' => $social,
                'image' => strtolower($social),
            ]);
        }
    }
}
