<?php

namespace Database\Seeders;

use App\Models\Concession;
use Illuminate\Database\Seeder;

class ConcessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $concessions = ['Keyworkers', 'Low income', 'OAPs', 'Students', 'Trainee counsellors', 'Unemployed'];

        foreach ($concessions as $data) {
            Concession::updateOrCreate([
                'name' => $data,
                'slug' => generateSlug($data),
            ]);
        }
    }
}
