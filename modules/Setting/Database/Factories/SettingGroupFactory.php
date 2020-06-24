<?php

use Faker\Generator as Faker;
use ListaShop\Setting\Models\SettingGroup;

$factory->define(SettingGroup::class, function (Faker $faker) {

    return [
        'title' => $faker->sentence(2),
        'description' => $faker->sentence(),
        'icon' => 'fa fa-cog',
        'setting_group_id' => function () {
            return (bool)random_int(0, 1) ? factory(SettingGroup::class)->create()->id : null;
        },
    ];
});

