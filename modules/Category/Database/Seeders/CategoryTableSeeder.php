<?php

namespace ListaShop\Category\Database\Seeders;

use DB;
use Carbon\Carbon;
use ListaShop\Category\Models\Category;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    public function run(Faker $faker)
    {

        for ($i = 0; $i < 5; $i++) {

            $id = $i + 1;

            Category::create([
                'name' => $faker->word,
                'slug' => $faker->unique()->randomNumber,
                'image' => 'categories/category-' . $id . '.png',
            ]);
        }
    }
}
