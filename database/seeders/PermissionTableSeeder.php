<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    public function run()
    {
        // $this->command->info(var_dump($this->getModelNames()));

        $permissionNames = [];
        $counter = 0;

        foreach($this->getModelNames() as $modelName){
            $permissionNames[$counter++] = $modelName . '@viewAny';
            $permissionNames[$counter++] = $modelName . '@view';
            $permissionNames[$counter++] = $modelName . '@create';
            $permissionNames[$counter++] = $modelName . '@update';
            $permissionNames[$counter++] = $modelName . '@delete';
            $permissionNames[$counter++] = $modelName . '@restore';
            $permissionNames[$counter++] = $modelName . '@forceDelete';
        }

        foreach($permissionNames as $permissionName){
            Permission::insert(['name' => $permissionName]);
        }
    }

    public function getModelNames(): array
    {
        $path = app_path('Models') . '/*.php';
        return collect(glob($path))->map(fn ($file) => basename($file, '.php'))->toArray();
    }
}
