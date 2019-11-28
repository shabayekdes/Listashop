<?php

namespace Category\Database\Seeders;

use DB;
use Carbon\Carbon;
use Category\Models\Category;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    public function run(Faker $faker)
    {

        for ($i=0; $i < 5 ; $i++) {

            $id = $i+1;

            Category::create([
                'name' => $faker->sentence(),
                'slug' => $faker->unique()->randomNumber,
                'image' => 'categories/category-'. $id .'.png',
            ]);

        }
    }
}
