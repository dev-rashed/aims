<?php

namespace Database\Factories;

use App\Models\Counsellor;
use App\Models\Course;
use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = fake()->sentence();
        $duration = ['Week', 'Month'];

        return [
            'counsellor_id' => rand(1, Counsellor::count()),
            'language_id' => rand(1, Language::count()),
            'title' => $title,
            'slug' => generateSlug($title),
            'short_description' => fake()->text(),
            'image' => 'default.jpg',
            'description' => fake()->realText(),
            'duration' => rand(1, 10).' '.$duration[rand(0, 1)],
            'total_class' => rand(10, 100),
            'price' => rand(20, 200),
            'type' => [Course::TYPE_ONLINE, Course::TYPE_ADVANCED][rand(0, 1)],
        ];
    }
}
