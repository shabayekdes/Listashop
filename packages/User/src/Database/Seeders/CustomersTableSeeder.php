<?php

namespace User\Database\Seeders;

use Illuminate\Database\Seeder;
use User\Models\User;

class CustomersTableSeeder extends Seeder
{
    public function run()
    {
        factory(User::class, 10)->create();
    }
}
