<?php

namespace Order\Database\Seeders;

use Illuminate\Database\Seeder;
use Order\Models\Order;

class OrdersTableSeeder extends Seeder
{
    public function run()
    {
        factory(Order::class, 10)->create();
    }
}
