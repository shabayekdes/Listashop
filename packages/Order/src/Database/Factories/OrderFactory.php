<?php

use Order\Models\OrderProduct;
use Order\Models\Order;
use Illuminate\Support\Str;

$factory->define(OrderProduct::class, function (Faker\Generator $faker) {

    return [
        'quantity' => $faker->numberBetween(1, 20),
        'total' => $faker->numberBetween(10, 9000),
        'order_id' => $faker->numberBetween(1, 10),
        'product_id' => $faker->numberBetween(1, 10),
    ];
});
$factory->define(Order::class, function (Faker\Generator $faker) {

    return [
        'key' => Str::random(),
        'item_count' => 1,
        'grand_total' => $faker->numberBetween(10, 9000),
        'payment_method' => 'cod',
        'user_id' => $faker->numberBetween(1, 10)
    ];
});
