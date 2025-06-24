<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);

        if (config('app.env') == 'local') {
            $this->call(ProfessionSeeder::class);
            $this->call(LanguageSeeder::class);
            $this->call(SessionSeeder::class);
            $this->call(AccessibilitySeeder::class);
            $this->call(ConcessionSeeder::class);
            $this->call(FormatSeeder::class);
            $this->call(OnlinePlatformSeeder::class);
            $this->call(TherapistSeeder::class);
            $this->call(PageSeeder::class);
            $this->call(MembershipPlanSeeder::class);
            $this->call(CurrencySeeder::class);
            \App\Models\Counsellor::factory(5)->create();
            \App\Models\Course::factory(5)->create();
            \App\Models\Event::factory(5)->create();
            \App\Models\ArticleCategory::factory(5)->create();
            \App\Models\Article::factory(5)->create();
            \App\Models\Review::factory(3)->create();
            \App\Models\Service::factory(3)->create();
            \App\Models\Coupon::factory(3)->create();
            \App\Models\Subscribe::factory(20)->create();
        }

        $this->call(CourseModuleSeeder::class);
        $this->call(SettingSeeder::class);

    }
}
