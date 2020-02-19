<?php

use Product\Models\Product;
use Illuminate\Support\Arr;

$factory->define(Product::class, function (Faker\Generator $faker) {
    $type = ['simple', 'configurable'];
    $id = $faker->numberBetween(1, 10);
    return [
        'name' => $faker->text(60),
        'description' => $faker->paragraph(),
        'price' => $faker->numberBetween(10, 9000),
        'cost' => $faker->numberBetween(10, 9000),
        'type' => Arr::random($type),
        'slug' => $faker->slug(),
        'sku' => $faker->word(),
        'is_active' => $faker->boolean(),
        'featured' => ceil(rand(0, 1)),
        'special_price' => $faker->numberBetween(10, 9000),
        'thumbnail' => 'products/'. $id .'/product-'. $id .'.jpg',
        'category_id' => ceil(rand(1, 5))
    ];
});
