<?php

namespace ListaShop\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Attribute\Database\Seeders\AttributeTableSeeder as AttributeSeeder;
use ListaShop\User\Database\Seeders\DatabaseSeeder as UserSeeder;
use ListaShop\Product\Database\Seeders\ProductTableSeeder as ProductSeeder;
use ListaShop\Category\Database\Seeders\CategoryTableSeeder as CategorySeeder;
use ListaShop\Option\Database\Seeders\OptionTableSeeder as OptionSeeder;
use ListaShop\Order\Database\Seeders\OrdersTableSeeder as OrderSeeder;
use ListaShop\Customer\Database\Seeders\CustomersTableSeeder as CustomerSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(UserSeeder::class);
        // $this->call(AttributeSeeder::class);
        $this->call(OptionSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(CustomerSeeder::class);
    }
}
