<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Create permissions
        $permissions = [
            ['name' => 'view_users', 'description' => 'Can view users list'],
            ['name' => 'edit_users', 'description' => 'Can edit users'],
            ['name' => 'delete_users', 'description' => 'Can delete users'],
            ['name' => 'manage_roles', 'description' => 'Can manage roles'],
            ['name' => 'manage_permissions', 'description' => 'Can manage permissions'],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

        // Create roles
        $roles = [
            [
                'name' => 'admin',
                'description' => 'Administrator',
                'permissions' => ['view_users', 'edit_users', 'delete_users', 'manage_roles', 'manage_permissions']
            ],
            [
                'name' => 'employee',
                'description' => 'Employee',
                'permissions' => ['view_users', 'edit_users']
            ],
            [
                'name' => 'user',
                'description' => 'Regular User',
                'permissions' => []
            ]
        ];

        foreach ($roles as $roleData) {
            $role = Role::create([
                'name' => $roleData['name'],
                'description' => $roleData['description']
            ]);

            $permissions = Permission::whereIn('name', $roleData['permissions'])->get();
            $role->permissions()->sync($permissions);
        }
    }
} 