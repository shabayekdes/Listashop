<?php

namespace ListaShop\Category\Database\Seeders;

use ListaShop\Category\Models\Category;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        factory(Category::class, 5)->create();
    }
}
