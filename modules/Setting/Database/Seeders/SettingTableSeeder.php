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
                'setting_key' => 'general_default_language',
                'setting_group_id' => 4,
                'type' => 'select',
                'attributes' => [
                    'label' => 'Default Language', // label for input
                    // optional properties
                    'class' => 'form-control', // override global input_class
                    'options' => [
                        [
                            'value' => 'en',
                            'text' => 'English'
                        ],
                        [
                            'value' => 'ar',
                            'text' => 'Arabic'
                        ]
                    ]
                ]
            ],
            [
                'setting_key' => 'store_store_name',
                'setting_group_id' => 5,
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
                'setting_key' => 'store_store_email',
                'setting_group_id' => 5,
                'type' => 'email',
                'attributes' => [
                    'label' => 'Store Email', // label for input
                    // optional properties
                    'placeholder' => 'Store email', // placeholder for input
                    'class' => 'form-control', // override global input_class
                    'hint' => 'You can set the app name here' // help block text for input
                ]
            ],
            [
                'setting_key' => 'store_phone_number',
                'setting_group_id' => 5,
                'type' => 'text',
                'attributes' => [
                    'label' => 'Phone Number', // label for input
                    // optional properties
                    'placeholder' => 'Phone number', // placeholder for input
                    'class' => 'form-control', // override global input_class
                    'hint' => 'You can set the app name here' // help block text for input
                ]
            ],
            [
                'setting_key' => 'store_adress',
                'setting_group_id' => 5,
                'type' => 'textarea',
                'attributes' => [
                    'label' => 'Store Address', // label for input
                    // optional properties
                    'placeholder' => 'Store address', // placeholder for input
                    'class' => 'form-control', // override global input_class
                    'hint' => 'You can set the app name here' // help block text for input
                ]
            ],
            [
                'setting_key' => 'free_shipping_status',
                'setting_group_id' => 7,
                'type' => 'checkbox',
                'attributes' => [
                    'label' => 'Enable free shipping', // label for input
                    // optional properties
                    'class' => 'form-control', // override global input_class
                    'name' => 'Status' // help block text for input
                ]
            ],
            [
                'setting_key' => 'flat_shipping_status',
                'setting_group_id' => 7,
                'type' => 'checkbox',
                'attributes' => [
                    'label' => 'Enable flat shipping', // label for input
                    // optional properties
                    'class' => 'form-control', // override global input_class
                    'name' => 'Status'
                ]
            ],
            [
                'setting_key' => 'paypal_status',
                'setting_group_id' => 9,
                'type' => 'checkbox',
                'attributes' => [
                    'label' => 'Enable paypal payment', // label for input
                    // optional properties
                    'class' => 'form-control', // override global input_class
                    'name' => 'Status'
                ]
            ]
        ];
        foreach ($inputs as $input) {
            Setting::create($input);
        }
        // factory(Setting::class, 10)->create();
    }
}
