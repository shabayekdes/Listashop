<?php

use ListaShop\Option\Models\OptionValue;
use ListaShop\Option\Models\Option;
use Faker\Generator as Faker;

$factory->define(OptionValue::class, function (Faker $faker) {
    return [
        'option_id' => function () {
            return factory(Option::class)->create()->id;
        },
        'value' => $faker->word(),
        // 'price' => $faker->randomNumber(),
        // 'price_type' => $faker->randomElement(['fixed', 'percent']),
    ];
});

$factory->define(Option::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
        'code' => $faker->unique()->word(),
        'type' => $faker->randomElement(["Dropdown", "Checkbox"]),
        // 'is_required' => $faker->boolean(),
    ];
});
