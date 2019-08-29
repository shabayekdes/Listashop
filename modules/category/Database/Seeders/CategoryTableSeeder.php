<?php

namespace Category\Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->delete();

        $now = Carbon::now();

        DB::table('categories')->insert([
            [
                'id' => '1',
                'position' => '1',
                'image' => 'popular_1.png',
                'status' => '1',
                'name' => 'Laptops',
                'slug' => 'laptops',
                'description' => 'Root',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => '2',
                'position' => '1',
                'image' => 'popular_2.png',
                'status' => '1',
                'name' => 'Desktops',
                'slug' => 'desktops',
                'description' => 'Root',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => '3',
                'position' => '1',
                'image' => 'popular_3.png',
                'status' => '1',
                'name' => 'Tablets',
                'slug' => 'tablets',
                'description' => 'Root',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => '4',
                'position' => '1',
                'image' => 'popular_4.png',
                'status' => '1',
                'name' => 'TVs',
                'slug' => 'tvs',
                'description' => 'Root',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => '5',
                'position' => '1',
                'image' => 'popular_5.png',
                'status' => '1',
                'name' => 'Appliances',
                'slug' => 'appliances',
                'description' => 'Root',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => '6',
                'position' => '1',
                'image' => 'popular_1.png',
                'status' => '1',
                'name' => 'Digital Cameras',
                'slug' => 'digital-cameras',
                'description' => 'Root',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => '7',
                'position' => '1',
                'image' => 'popular_2.png',
                'status' => '1',
                'name' => 'Mobile Phones',
                'slug' => 'mobile-phones',
                'description' => 'Root',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
    }
}
