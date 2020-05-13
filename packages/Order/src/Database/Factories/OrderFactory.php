<?php

use Order\Models\Order;
use Illuminate\Support\Str;

$factory->define(Order::class, function (Faker\Generator $faker) {

    return [
        'key' => Str::random(),
        'item_count' => 1,
        'grand_total' => $faker->numberBetween(10, 9000),
        'user_id' => $faker->numberBetween(1, 10)
    ];
});
