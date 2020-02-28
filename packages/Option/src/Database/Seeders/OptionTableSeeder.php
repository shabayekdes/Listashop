<?php

namespace Option\Database\Seeders;

use Illuminate\Database\Seeder;
use Option\Models\Option;

class OptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Option::class, 10)->create();
    }
}
