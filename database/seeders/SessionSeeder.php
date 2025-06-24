<?php

namespace Database\Seeders;

use App\Models\Session;
use Illuminate\Database\Seeder;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sessions = ['Home Visits', 'In Person', 'Online', 'Phone'];

        foreach ($sessions as $data) {
            Session::updateOrCreate([
                'name' => $data,
                'slug' => generateSlug($data),
            ]);
        }
    }
}
