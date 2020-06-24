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
        // $setting = [
        //     'app' => [
        //         'title' => 'General Settings',
        //         'descriptions' => 'Application general settings.', // (optional)
        //         'icon' => 'fa fa-cog', // (optional)
        //         'inputs' => [
        //             [
        //                 'name' => 'app_name', // unique key for setting
        //                 'type' => 'text', // type of input can be text, number, textarea, select, boolean, checkbox etc.
        //                 'label' => 'App Name', // label for input
        //                 // optional properties
        //                 'placeholder' => 'Application Name', // placeholder for input
        //                 'class' => 'form-control', // override global input_class
        //                 'style' => '', // any inline styles
        //                 'rules' => 'required|min:2|max:20', // validation rules for this input
        //                 'value' => 'QCode', // any default value
        //                 'hint' => 'You can set the app name here' // help block text for input
        //             ],
        //             [
        //                 'name' => 'logo',
        //                 'type' => 'image',
        //                 'label' => 'Upload logo',
        //                 'hint' => 'Must be an image and cropped in desired size',
        //                 'rules' => 'image|max:500',
        //                 'disk' => 'public', // which disk you want to upload
        //                 'path' => 'app', // path on the disk,
        //                 'preview_class' => 'thumbnail',
        //                 'preview_style' => 'height:40px'
        //             ]
        //         ]
        //     ],
        //     'email' => [
        //         'title' => 'Email Settings',
        //         'descriptions' => 'How app email will be sent.',
        //         'icon' => 'fa fa-envelope',
    
        //         'inputs' => [
        //             [
        //                 'name' => 'from_email',
        //                 'type' => 'email',
        //                 'label' => 'From Email',
        //                 'placeholder' => 'Application from email',
        //                 'rules' => 'required|email',
        //             ],
        //             [
        //                 'name' => 'from_name',
        //                 'type' => 'text',
        //                 'label' => 'Email from Name',
        //                 'placeholder' => 'Email from Name',
        //             ]
        //         ]
        //     ]
        //             ];

        factory(SettingGroup::class, 3)
        ->create()
        ->each(function ($group) {

            factory(SettingGroup::class, 2)->create(['setting_group_id' => $group->id]);
        });
    }
}
