<?php

namespace ListaShop\Customer\Database\Seeders;

use Illuminate\Database\Seeder;
use ListaShop\Customer\Models\Customer;

class CustomersTableSeeder extends Seeder
{
    public function run()
    {
        factory(Customer::class, 10)->create();
    }
}
