<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $owner = Role::create(['name' => 'owner']);

        foreach(Permission::all() as $perm){
            $owner->permissions()->attach($perm->id);
        }
    }
}
