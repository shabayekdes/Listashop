<?php

namespace User\Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class AdminsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('admins')->insert([
                'id' => 1,
                'name' => 'Esmail Shabayek',
                'email' => 'esmail.shabayek@gmail.com',
                'password' => bcrypt('123456'),
                'status' => 1,
                'role_id' => 1,
            ]);
    }
}
