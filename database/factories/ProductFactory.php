<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Product\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'sku' => $faker->unique()->randomNumber,
        'name' => $faker->sentence(),
        'slug' => $faker->unique()->randomNumber,
        'price' => rand(149999, 249999),
        'cost' => rand(149999, 249999),
        'thumbnail' => "laptop-" . $faker->randomDigit .".jpg",
        'description' => $faker->text(),
        'category_id' => ceil(rand(1, 7))
    ];
});





