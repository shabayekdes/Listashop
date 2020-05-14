<?php

use User\Models\User;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->email,
        'password' => bcrypt('123456'),
    ];
});
