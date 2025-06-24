<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // if (!file_exists(storage_path('app/setting'))) {
        //     mkdir(storage_path('app/setting'), 0777, true);
        // }

        $settings = [
            ['key' => 'app_name', 'value' => 'AIMS'],
            ['key' => 'app_title', 'value' => fake()->sentence()],
            ['key' => 'app_description', 'value' => fake()->text()],
            ['key' => 'email', 'value' => 'info@deepgreen.studio'],
            ['key' => 'phone', 'value' => '+44 (899) 887-1088'],
            ['key' => 'logo', 'value' => 'logo.png'],
            ['key' => 'favicon', 'value' => 'favicon.png'],
            ['key' => 'timezone', 'value' => 'Asia/Dhaka'],
            ['key' => 'date_format', 'value' => 'd-m-Y'],
            ['key' => 'currency_symbol', 'value' => 1],
            ['key' => 'currency_code', 'value' => 'GDP'],
            ['key' => 'currency_position', 'value' => 'Before Amount'],
            ['key' => 'address', 'value' => fake()->address()],
            ['key' => 'copyright', 'value' => 'All rights reserved'],
            ['key' => 'invoice_prefix', 'value' => 'AIMS'],
            ['key' => 'socials', 'value' => json_encode([
                ['name' => 'facebook', 'url' => 'https://www.facebook.com'],
                ['name' => 'instagram', 'url' => 'https://www.instagram.com'],
                ['name' => 'twitter', 'url' => 'https://www.twitter.com'],
                ['name' => 'google', 'url' => 'https://www.google.com'],
                ['name' => 'google-plus', 'url' => 'https://www.google-plus.com'],
            ])],
            ['key' => 'sections', 'value' => json_encode([
                'service_section' => true,
                'video_section' => true,
                'insight_section' => true,
                'subscription_section' => true,
                'testimonial_section' => true,
                'counsellor_section' => true,
            ])],
        ];

        // $settings = [
        //     'app_name' => 'AIMS',
        //     'app_title' => fake()->sentence(),
        //     'app_description' => fake()->text(),
        //     'email' => 'info@deepgreen.studio',
        //     'phone' => '+44 (899) 887-1088',
        //     'logo' => 'logo.png',
        //     'favicon' => 'favicon.png',
        //     'timezone' => 'Asia/Dhaka',
        //     'date_format' => 'd-m-Y',
        //     'currency_symbol' => '£',
        //     'currency_code' => 'GDP',
        //     'currency_position' => 'Before Amount',
        //     'address' => fake()->address(),
        //     'copyright' => 'All rights reserved',
        //     'invoice_prefix' => 'AM',
        //     'socials' => json_encode([
        //         ['name' => 'facebook', 'url' => 'https://www.facebook.com'],
        //         ['name' => 'instagram', 'url' => 'https://www.instagram.com'],
        //         ['name' => 'twitter', 'url' => 'https://www.twitter.com'],
        //         ['name' => 'google', 'url' => 'https://www.google.com'],
        //         ['name' => 'google-plus', 'url' => 'https://www.google-plus.com'],
        //     ]),
        //     'sections' => json_encode([
        //         'hero_section'         => true,
        //         'service_section'      => true,
        //         'video_section'        => true,
        //         'insight_section'      => true,
        //         'subscription_section' => true,
        //         'testimonial_section'  => true,
        //         'counsellor_section'   => true
        //     ]),
        // ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate($setting);
        }

        // file_put_contents(storage_path('app/setting/main.txt'), base64_encode(serialize($settings)));
        // file_put_contents(storage_path('app/setting/main.txt'), json_encode($settings));
    }
}
