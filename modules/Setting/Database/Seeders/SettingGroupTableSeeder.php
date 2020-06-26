<?php

namespace ListaShop\Setting\Database\Seeders;

use ListaShop\Setting\Models\SettingGroup;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class SettingGroupTableSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        // All the sections for the settings page
        $settings = [
            [
                'title' => 'General Settings',
                'description' => 'Application general settings.', // (optional)
                'icon' => 'fa fa-cog', // (optional)
                'setting_group_id' => null
            ],
            [
                'title' => 'Shipping Methods',
                'description' => 'Shipping method settings.', // (optional)
                'icon' => 'fa fa-cog', // (optional)
                'setting_group_id' => null
            ],
            [
                'title' => 'Payment Gateway',
                'description' => 'Payment gateway settings.', // (optional)
                'icon' => 'fa fa-cog', // (optional)
                'setting_group_id' => null
            ],
            [
                'title' => 'Store',
                'description' => 'General store settings.', // (optional)
                'icon' => 'fa fa-cog', // (optional)
                'setting_group_id' => 1
            ],
            [
                'title' => 'Email',
                'description' => 'Email settings.', // (optional)
                'icon' => 'fa fa-cog', // (optional)
                'setting_group_id' => 1
            ]

        ];

        foreach ($settings as $setting) {
            SettingGroup::create($setting);
        }

        // factory(SettingGroup::class, 3)
        // ->create()
        // ->each(function ($group) {
        //     factory(SettingGroup::class, 2)->create(['setting_group_id' => $group->id]);
        // });
    }
}
