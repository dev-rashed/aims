<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = ['Chinese', 'Dutch', 'English', 'French', 'Italian', 'Spanish', 'Mandarin', 'Portuguese', 'Swedish'];

        foreach ($languages as $data) {
            Language::updateOrCreate([
                'name' => $data,
                'slug' => generateSlug($data),
            ]);
        }
    }
}
