<?php

namespace Order\Database\Seeders;

use Illuminate\Database\Seeder;
use Order\Models\Order;
use Order\Models\OrderProduct;

class OrdersTableSeeder extends Seeder
{
    public function run()
    {
        factory(Order::class, 10)->create();
        factory(OrderProduct::class, 30)->create();
    }
}
