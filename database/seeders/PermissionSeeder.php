<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {
            $permissions = [
                'role-list',
                'role-create',
                'role-edit',
                'role-delete',
                'role-user-list',
                'role-user-create',
                'role-user-edit',
                'role-user-delete',
                //departements
                'departement-list',
                'departement-create',
                'departement-edit',
                'departement-delete',
                //formation
                'formation-list',
                'formation-create',
                'formation-edit',
                'formation-delete',
                //contract
                'contract-list',
                'contract-create',
                'contract-edit',
                'contract-delete',
                'read',
                'update',
                'delete',
            ];

            foreach ($permissions as $permission) {
                Permission::firstOrCreate(['name' => $permission]);
            }
        });
    
    }
}
