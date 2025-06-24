<?php

namespace Database\Seeders;

use App\Models\Accessibility;
use Illuminate\Database\Seeder;

class AccessibilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accessibilities = ['Wheelchair-user access'];
        foreach ($accessibilities as $data) {
            Accessibility::updateOrCreate([
                'name' => $data,
                'slug' => generateSlug($data),
            ]);
        }
    }
}
