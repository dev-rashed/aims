<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = [
            'Dashboard',
            'Role',
            'Staff',

            'Profession',
            'Language',
            'Session',
            'Accessibility',
            'Concession',
            'Format',
            'Online Platform',
            'Therapist',
            'New Application',

            'Counsellor',
            'Course',
            'Enroll',
            'Event',
            'Article Category',
            'Career',

            'Membership Plan',
            'Membership',
            'Review',
            'Service',
            'Student',
            'Certificate',
            'Coupon',
            'Order',
            'Payment',
            'Career',
            'Renew',

            'Booking',
            'Article',
            'Subscribe',

            'Page',
            'Setting',
        ];

        $permissions = ['Create', 'Show', 'Edit', 'Delete'];

        foreach ($modules as $module) {
            $mod = Module::updateOrCreate(['name' => $module]);

            foreach ($permissions as $permission) {
                $mod->permissions()->updateOrCreate([
                    'name' => "$permission $module",
                    'slug' => strtolower($permission).'_'.strtolower(str_replace(' ', '_', $module)),
                ]);
            }
        }

        Role::query()->find(1)->update(['permissions' => DB::table('permissions')->pluck('slug')->toArray()]);
    }
}
