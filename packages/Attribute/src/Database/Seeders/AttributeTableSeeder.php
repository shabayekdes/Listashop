<?php

namespace Attribute\Database\Seeders;

use Attribute\Models\Attribute;
use Illuminate\Database\Seeder;

class AttributeTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $attribute = Attribute::create([
            'key' => 'color',
            'name' => 'Color'
        ]);
        $attribute->values()->createMany([
            ['value' => 'Red', 'position' => 0],
            ['value' => 'Black', 'position' => 0],
            ['value' => 'Blue', 'position' => 0],
        ]);

        $attribute = Attribute::create([
            'key' => 'size',
            'name' => 'Size'
        ]);
        $attribute->values()->createMany([
            ['value' => 'Medium', 'position' => 0],
            ['value' => 'Large', 'position' => 0],
            ['value' => 'XLarge', 'position' => 0],
        ]);
    }
}
