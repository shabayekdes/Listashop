<?php
namespace Admin\Database\Seeders;

use Admin\Models\Roles;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::create([
            'name' => 'Admin',
            'description' => 'Admin',
        ]);
        Roles::create([
            'name' => 'editor',
            'description' => 'Editor',
        ]);
    }
}
