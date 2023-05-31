<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list conversations']);
        Permission::create(['name' => 'view conversations']);
        Permission::create(['name' => 'create conversations']);
        Permission::create(['name' => 'update conversations']);
        Permission::create(['name' => 'delete conversations']);

        Permission::create(['name' => 'list messages']);
        Permission::create(['name' => 'view messages']);
        Permission::create(['name' => 'create messages']);
        Permission::create(['name' => 'update messages']);
        Permission::create(['name' => 'delete messages']);

        Permission::create(['name' => 'list posts']);
        Permission::create(['name' => 'view posts']);
        Permission::create(['name' => 'create posts']);
        Permission::create(['name' => 'update posts']);
        Permission::create(['name' => 'delete posts']);

        Permission::create(['name' => 'list postcategories']);
        Permission::create(['name' => 'view postcategories']);
        Permission::create(['name' => 'create postcategories']);
        Permission::create(['name' => 'update postcategories']);
        Permission::create(['name' => 'delete postcategories']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'customer']);
        $userRole->givePermissionTo($currentPermissions);

        $sellerRole = Role::create(['name' => 'seller']);
        $sellerRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('admin@chambalo.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
