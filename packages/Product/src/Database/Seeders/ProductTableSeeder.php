<?php

namespace Product\Database\Seeders;

use Illuminate\Support\Arr;
use Product\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        // factory(Product::class,10)->create();

        $type = ['simple', 'configurable'];

        for ($i=0; $i < 10 ; $i++) {

            $id = $i+1;

            $product = Product::create([
                'sku' => $faker->unique()->randomNumber,
                'slug' => $faker->unique()->randomNumber,
                'type' => Arr::random($type),
                'categories_id' => ceil(rand(1, 7))
            ]);
            $product->flat()->create([
                'sku' => $faker->unique()->randomNumber,
                'name' => $faker->sentence(),
                'price' => rand(1999, 9999),
                'thumbnail' => 'products/'. $id .'/product-'. $id .'.jpg',
                'cost' => rand(599, 2000),
                'description' => $faker->text(),
                'featured' => ceil(rand(0, 1)),
                'special_price' => rand(599, 2000)
            ]);
        }


    }
}