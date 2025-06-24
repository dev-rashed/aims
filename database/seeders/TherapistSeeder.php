<?php

namespace Database\Seeders;

use App\Models\Accessibility;
use App\Models\Concession;
use App\Models\Language;
use App\Models\Profession;
use App\Models\Session;
use App\Models\User;
use Illuminate\Database\Seeder;

class TherapistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 0; $i <= 5; $i++) {
            $first_name = fake('en_GB')->firstName();
            $last_name = fake('en_GB')->lastName();
            $user = User::updateOrCreate([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => fake()->safeEmail(),
                'phone' => fake('en_GB')->phoneNumber(),
                'username' => generateSlug("$first_name $last_name"),
                'location' => fake('en_GB')->address(),
                'account_type' => User::TYPE_PRACTITIONER,
                'email_verified_at' => now(),
                'password' => bcrypt('12345678'),
            ]);

            $therapist = $user->therapist()->updateOrCreate([
                'degree' => fake()->sentence(),
                'short_description' => fake()->text(),
                'website' => fake()->url(),
                'key_details' => fake()->sentence(),
                'about' => fake()->realText(),
                'experience' => fake()->realText(),
                'fees' => rand(5, 500),
                'availability' => fake()->realText(),
                'further_information' => fake()->realText(),
                'status' => 'approved',
                'tags' => fake()->word().','.fake()->word().','.fake()->word().','.fake()->word(),
            ]);

            $therapist->professions()->sync(Profession::pluck('id'));
            $therapist->languages()->sync(Language::pluck('id'));
            $therapist->sessions()->sync(Session::pluck('id'));
            $therapist->accessibilities()->sync(Accessibility::pluck('id'));
            $therapist->concessions()->sync(Concession::pluck('id'));
        }

    }
}
