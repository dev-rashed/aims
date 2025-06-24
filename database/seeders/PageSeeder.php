<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = ['About Us', 'Privacy Policy', 'Return Policy'];
        foreach ($pages as $page) {
            Page::create([
                'name' => $page,
                'slug' => generateSlug($page),
                'title' => fake()->sentence,
                'description' => fake()->realText(),
                'meta_keywords' => fake()->sentence(),
                'meta_title' => fake()->sentence(),
                'meta_description' => fake()->text(),
            ]);
        }
    }
}
