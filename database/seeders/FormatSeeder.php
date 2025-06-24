<?php

namespace Database\Seeders;

use App\Models\Format;
use Illuminate\Database\Seeder;

class FormatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $formats = ['Professional supervision', 'Organisational', 'Family', 'Couples', 'Individual'];

        foreach ($formats as $format) {
            Format::updateOrCreate([
                'name' => $format,
                'slug' => generateSlug($format),
            ]);
        }
    }
}
