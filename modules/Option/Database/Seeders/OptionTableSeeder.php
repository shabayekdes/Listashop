<?php

namespace ListaShop\Option\Database\Seeders;

use ListaShop\Value\Models\Value;
use ListaShop\Option\Models\Option;
use Illuminate\Database\Seeder;

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

        factory(Option::class, 10)
            ->create()
            ->each(function ($option) {
                $times = $option->type === 'Dropdown' ? 5 : 1;

                factory(Value::class, $times)->create(['valuable_id' => $option->id]);
            });
    }
}
