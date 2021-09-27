<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        Role::insert([
            ['name' => 'owner', 'priority' => 100],
            ['name' => 'admin', 'priority' => 80],
            ['name' => 'author', 'priority' => 60],
            ['name' => 'user', 'priority' => 40],
        ]);
    }
}
