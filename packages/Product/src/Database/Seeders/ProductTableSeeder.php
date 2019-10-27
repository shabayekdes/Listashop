<?php

namespace Product\Database\Seeders;

use Product\Models\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    public function run()
    {
        factory(Product::class,50)->create();
    }
}
