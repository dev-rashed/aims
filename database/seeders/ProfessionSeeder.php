<?php

namespace Database\Seeders;

use App\Models\Profession;
use Illuminate\Database\Seeder;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $professions = ['Counsellor or Psychotherapist', 'Imam or Religious Counsellor', 'Life-Coach', 'Chaplain', 'Raqi'];
        foreach ($professions as $data) {
            Profession::updateOrCreate([
                'name' => $data,
                'slug' => generateSlug($data),
            ]);
        }
    }
}
