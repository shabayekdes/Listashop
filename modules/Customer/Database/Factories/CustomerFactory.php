<?php

use ListaShop\Customer\Models\Customer;

$factory->define(Customer::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->email,
        'phone' => $faker->unique()->e164PhoneNumber,
        'password' => bcrypt('123456'),
    ];
});
