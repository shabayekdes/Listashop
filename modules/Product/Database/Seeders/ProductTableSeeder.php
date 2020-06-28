<?php

namespace ListaShop\Product\Database\Seeders;

use Illuminate\Support\Arr;
use ListaShop\Product\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        factory(Product::class, 10)->create();

        // $type = ['simple', 'configurable'];

        // for ($i=0; $i < 10 ; $i++) {

        //     $id = $i+1;

        //     $product = Product::create([
        //         'type' => Arr::random($type),
        //         'category_id' => ceil(rand(1, 5)),
        //         'sku' => $faker->unique()->randomNumber,
        //         'thumbnail' => 'products/'. $id .'/product-'. $id .'.jpg',
        //         'cost' => rand(599, 2000),
        //         'description' => $faker->text(),
        //         'featured' => ceil(rand(0, 1)),
        //         'name' => $faker->text(60),
        //         'description' => $faker->paragraph(),
        //         'price' => $faker->numberBetween(10, 9000),
        //         'type' => Arr::random($type),
        //         'slug' => $faker->unique()->slug(),
        //         'sku' => $faker->unique()->word(),
        //         'is_active' => $faker->boolean(),
        //     ]);

        // }


    }
}
