<?php
namespace Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use User\Database\Seeders\DatabaseSeeder as UserSeeder;
use Product\Database\Seeders\ProductTableSeeder as ProductSeeder;
use Category\Database\Seeders\CategoryTableSeeder as CategorySeeder;

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
    }
}
