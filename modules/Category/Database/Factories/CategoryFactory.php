<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use ListaShop\Category\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'slug' => $faker->unique()->slug(),
        'popular' => $faker->boolean(),
        'image' => 'categories/category-' . $faker->numberBetween(1, 5) . '.png',
    ];
});
