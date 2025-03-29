<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                
        $role = Role::create(['name' => 'Admin']);
        $permission = Permission::create(['name' => 'manage users']);
        $role->givePermissionTo($permission);
        $user = User::find(1);
        $permission->assignRole($role);
        //
    }
}
