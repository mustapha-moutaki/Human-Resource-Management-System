<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Admin = Role::create(['name' =>'Admin']);
        $HR = Role::create(['name' =>'HR']);
        $Manager = Role::create(['name' =>'Manager']);
        $Employee = Role::create(['name' =>'Employee']);
        $permissions =['add users', 'delete users', 'edit users', 'show users'];
        foreach($permissions as $permisssion){
            Permission::create(['name' => $permisssion]);
        }

        $Admin->givePermissionTo(Permission::all());
        $Manager->givePermissionTo(['add users', 'edit users']);
        $HR->givePermissionTo(['delete users', 'show users']);
        $Employee->givePermissionTo(['show users']);


    }
}
