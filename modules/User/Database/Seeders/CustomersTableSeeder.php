<?php

namespace ListaShop\User\Database\Seeders;

use Illuminate\Database\Seeder;
use ListaShop\User\Models\User;

class CustomersTableSeeder extends Seeder
{
    public function run()
    {
        factory(User::class, 10)->create();
    }
}
