<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'first_name' => 'Smith',
                'last_name' => 'Murphy',
                'email' => 'smithmurphy@gmail.com',
                'phone' => fake('en_GB')->phoneNumber(),
                'username' => generateSlug('Smith Murphy'),
                'location' => fake('en_GB')->address(),
                'email_verified_at' => now(),
                'password' => bcrypt('12345678'),
            ],
            [
                'first_name' => 'Brown',
                'last_name' => 'Walsh',
                'email' => 'brownwalsh@gmail.com',
                'phone' => fake('en_GB')->phoneNumber(),
                'username' => generateSlug('Brown Walsh'),
                'location' => fake('en_GB')->address(),
                'account_type' => User::TYPE_PRACTITIONER,
                'email_verified_at' => now(),
                'password' => bcrypt('12345678'),
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate($user);
        }
    }
}
