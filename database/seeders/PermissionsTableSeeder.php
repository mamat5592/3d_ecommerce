<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permission_ids = [];
        $routes = Route::getRoutes();

        foreach ($routes as $route) {
            $route_name = $route->getName();

            if(!$route_name){
                continue;
            }

            $permission_check = Permission::where('route', $route_name)->first();

            if (!$permission_check) {
                $permission = Permission::create([
                    'route' => $route_name
                ]);

                $permission_ids[] = $permission->id;
            }
        }

        $admin_role = Role::where('name', 'admin')->first();

        $admin_role->permissions()->attach($permission_ids);
    }
}
