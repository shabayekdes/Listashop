<?php

namespace ListaShop\Customer\Database\Seeders;

use Illuminate\Database\Seeder;
use ListaShop\Customer\Models\Customer;
use ListaShop\Customer\Models\CustomerAddress;

class CustomersTableSeeder extends Seeder
{
    public function run()
    {
        factory(Customer::class, 10)
            ->create()
            ->each(function ($customer) {
                factory(CustomerAddress::class, rand(1, 4))->create(['customer_id' => $customer->id]);
            });
    }
}
