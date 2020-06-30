<?php

namespace ListaShop\Option\Database\Seeders;

use ListaShop\Option\Models\OptionValue;
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
        // factory(Option::class, 10)->create();

        factory(Option::class, 10)
            ->create()
            ->each(function ($option) {
                $times = $option->type === 'Dropdown' ? 5 : 1;

                factory(OptionValue::class, $times)->create(['option_id' => $option->id]);
            });
    }
}
