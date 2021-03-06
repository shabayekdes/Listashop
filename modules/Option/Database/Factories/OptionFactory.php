<?php

use ListaShop\Value\Models\Value;
use ListaShop\Option\Models\Option;
use Faker\Generator as Faker;

$factory->define(Value::class, function (Faker $faker) {
    return [
        'valuable_id' => function () {
            return factory(Option::class)->create()->id;
        },
        'valuable_type' => Option::class,
        'value' => $faker->word(),
        // 'price' => $faker->randomNumber(),
        // 'price_type' => $faker->randomElement(['fixed', 'percent']),
    ];
});

$factory->define(Option::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
        'key' => $faker->unique()->word(),
        'type' => $faker->randomElement(["Dropdown", "Checkbox"]),
        // 'is_required' => $faker->boolean(),
    ];
});
