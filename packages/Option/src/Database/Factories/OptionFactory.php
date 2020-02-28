<?php

use Faker\Generator as Faker;
use Option\Models\Option;

$factory->define(Option::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
        'key' => $faker->unique()->word(),
        'type' => $faker->randomElement(['field', 'dropdown']),
        'is_required' => $faker->boolean(),
    ];
});
