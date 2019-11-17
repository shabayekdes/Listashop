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
            'name' => 'Color'
        ]);
        $attribute->options()->createMany([
            ['label' => 'Red'],
            ['label' => 'Black'],
            ['label' => 'Blue'],
        ]);

        $attribute = Attribute::create([
            'name' => 'Size'
        ]);
        $attribute->options()->createMany([
            ['label' => 'Medium'],
            ['label' => 'Large'],
            ['label' => 'XLarge'],
        ]);
    }
}