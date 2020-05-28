<?php

use Illuminate\Database\Seeder;
use ListaShop\Admin\Database\Seeders\DatabaseSeeder as ListashopDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ListashopDatabaseSeeder::class);
    }
}
