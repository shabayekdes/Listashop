<?php

namespace ListaShop\Setting\Database\Seeders;

use ListaShop\Setting\Models\Setting;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        $inputs = [
            [
                'setting_key' => 'general_settings_store_store_name',
                'setting_group_id' => 4,
                'type' => 'text',
                'attributes' => [
                    'label' => 'Store Name', // label for input
                    // optional properties
                    'placeholder' => 'Application Name', // placeholder for input
                    'class' => 'form-control', // override global input_class
                    'hint' => 'You can set the app name here' // help block text for input
                ]
            ],
            [
                'setting_key' => 'general_settings_store_contact_email',
                'setting_group_id' => 4,
                'type' => 'email',
                'attributes' => [
                    'label' => 'Contact Email', // label for input
                    // optional properties
                    'class' => 'form-control', // override global input_class
                    'hint' => 'You can set the contact email here' // help block text for input
                ]
            ],
            [
                'setting_key' => 'general_settings_store_default_language',
                'setting_group_id' => 4,
                'type' => 'email',
                'attributes' => [
                    'label' => 'Default Language', // label for input
                    // optional properties
                    'class' => 'form-control', // override global input_class
                    'options' => [
                        [
                            'value' => 'eng',
                            'text' => 'English'
                        ],
                        [
                            'value' => 'ar',
                            'text' => 'Arabic'
                        ]
                    ]
                ]
            ]
        ];
        foreach ($inputs as $input) {
            Setting::create($input);
        }
        // factory(Setting::class, 10)->create();
    }
}
