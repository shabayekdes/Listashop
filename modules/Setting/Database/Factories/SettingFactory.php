<?php

use Faker\Generator as Faker;
use ListaShop\Setting\Models\Setting;
use Illuminate\Support\Str;

$factory->define(Setting::class, function (Faker $faker) {
    
    return [
        'label' => $faker->word,
        'setting_key' => Str::slug($faker->sentence(3), '-'),
        'setting_group_id' => $faker->numberBetween(5, 10)
    ];
});
