<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Product\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'sku' => $faker->unique()->randomNumber,
        // 'name' => $faker->sentence(),
        'slug' => $faker->unique()->randomNumber,
        'type' => 'simple',
        // 'price' => rand(1999, 9999),
        // 'cost' => rand(599, 2000),
        // 'description' => $faker->text(),
        'categories_id' => ceil(rand(1, 7)),
        // 'featured' => ceil(rand(0, 1)),
        // 'special_price' => rand(599, 2000)
    ];
});
