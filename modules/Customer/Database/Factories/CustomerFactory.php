<?php

use ListaShop\Customer\Models\Customer;
use ListaShop\Customer\Models\CustomerAddress;
use Faker\Generator as Faker;

$factory->define(CustomerAddress::class, function (Faker $faker) {
    return [
        'customer_id' => function () {
            return factory(Customer::class)->create()->id;
        },
        'address' => $faker->address,
        'state' => $faker->state,
        'city' => $faker->city,
        'postcode' => $faker->postcode,
        'address_lat' => $faker->latitude($min = -90, $max = 90),
        'address_lng' => $faker->longitude($min = -180, $max = 180),
    ];
});

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->email,
        'phone' => $faker->unique()->e164PhoneNumber,
        'password' => bcrypt('123456'),
    ];
});
