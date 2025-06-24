<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseModule;
use Illuminate\Database\Seeder;

class CourseModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            $title = fake()->sentence();
            CourseModule::create([
                'course_id' => rand(1, Course::count()),
                'title' => $title,
                'slug' => generateSlug($title),
                'lectures' => json_encode([
                    [
                        'title' => fake()->sentence(),
                        'duration' => 20,
                        'video_id' => '777579237',
                        'status' => fake()->boolean(),
                    ],
                    [
                        'title' => fake()->sentence(),
                        'duration' => 391,
                        'video_id' => '777594377',
                        'status' => fake()->boolean(),
                    ],
                    [
                        'title' => fake()->sentence(),
                        'duration' => 20,
                        'video_id' => '777579237',
                        'status' => fake()->boolean(),
                    ],
                ]),
            ]);
        }
    }
}
