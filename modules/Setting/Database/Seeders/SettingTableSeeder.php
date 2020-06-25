<?php

namespace ListaShop\Setting\Database\Seeders;

use ListaShop\Setting\Models\Setting;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        factory(Setting::class, 10)->create();
    }
}
