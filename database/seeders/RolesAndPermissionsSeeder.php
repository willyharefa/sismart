<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Menu Customer
        Permission::create(['name' => 'read-customer']);
        Permission::create(['name' => 'create-customer']);
        Permission::create(['name' => 'detail-customer']);
        Permission::create(['name' => 'edit-customer']);
        Permission::create(['name' => 'delete-customer']);
        //Menu Ticket
        Permission::create(['name' => 'read-ticket']);
        Permission::create(['name' => 'create-ticket']);
        Permission::create(['name' => 'detail-ticket']);
        Permission::create(['name' => 'edit-ticket']);
        Permission::create(['name' => 'delete-ticket']);
        // Menu Hot Prospect
        Permission::create(['name' => 'view-hot-prospect']);
        Permission::create(['name' => 'edit-hot-prospect']);
        Permission::create(['name' => 'print-hot-prospect']);
        // Menu User
        Permission::create(['name' => 'read-user']);
        Permission::create(['name' => 'create-user']);
        Permission::create(['name' => 'edit-user']);
        Permission::create(['name' => 'delete-user']);
        Permission::create(['name' => 'detail-user']);
    }
}
