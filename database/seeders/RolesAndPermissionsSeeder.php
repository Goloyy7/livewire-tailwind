<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        $permissions = [
        'view_users',
        'create_users',
        'edit_users',
        'delete_users',
        'view_user_groups',
        'create_user_groups',
        'edit_user_groups',
        'delete_user_groups',
        'view_roles',
        'create_roles',
        'edit_roles',
        'delete_roles',
        'view_permissions',
        'create_permissions',
        'edit_permissions',
        'delete_permissions',
        'view_settings',
        'edit_settings',
    ];

    foreach ($permissions as $permission) {
        Permission::create(['name' => $permission]);
    }

        // create roles and assign created permissions
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());

        // Create admin user
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);
        
        $user->assignRole('admin');
    }
}
