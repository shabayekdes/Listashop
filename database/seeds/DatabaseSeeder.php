<?php

use Illuminate\Database\Seeder;
use Product\Database\Seeders\ProductTableSeeder;
use Category\Database\Seeders\CategoryTableSeeder as CategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategorySeeder::class);
        $this->call(ProductTableSeeder::class);
    }
}
