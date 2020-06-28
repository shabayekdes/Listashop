<?php

namespace ListaShop\Order\Database\Seeders;

use Illuminate\Database\Seeder;
use ListaShop\Order\Models\Order;
use ListaShop\Order\Models\OrderProduct;

class OrdersTableSeeder extends Seeder
{
    public function run()
    {
        factory(Order::class, 10)->create();
        factory(OrderProduct::class, 30)->create();
    }
}
