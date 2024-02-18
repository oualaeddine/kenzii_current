<?php

namespace Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $admin = Role::create(['name' => 'admin']);
        $supervisor = Role::create(['name' => 'supervisor']);
        $operator = Role::create(['name' => 'operator']);
        $packaging = Role::create(['name' => 'packaging']);

        //admin
        Permission::create(['name' => 'Manage users']);
        Permission::create(['name' => 'Manage products']);
        Permission::create(['name' => 'Manage stores']);
        Permission::create(['name' => 'Manage bons']);
        Permission::create(['name' => 'Manage charges']);
        Permission::create(['name' => 'Manage settings']);
        //supervisor
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'view products']);
        Permission::create(['name' => 'view stores']);
        Permission::create(['name' => 'view statistics']);
        Permission::create(['name' => 'view bons']);
        Permission::create(['name' => 'view charges']);
        Permission::create(['name' => 'view orders']);
        Permission::create(['name' => 'view payments']);
        //packaging
        Permission::create(['name' => 'View confirmed 2']);
        Permission::create(['name' => 'View ready to ship']);
        Permission::create(['name' => 'set ready to ship']);
        Permission::create(['name' => 'set shipped']);
        //operator
        Permission::create(['name' => 'change order status']);

        $supervisor->givePermissionTo('view users');
        $supervisor->givePermissionTo('view products');
        $supervisor->givePermissionTo('view stores');
        $supervisor->givePermissionTo('view statistics');
        $supervisor->givePermissionTo('view bons');
        $supervisor->givePermissionTo('view charges');
        $supervisor->givePermissionTo('view orders');
        $supervisor->givePermissionTo('view payments');
        $supervisor->givePermissionTo('View confirmed 2');
        $supervisor->givePermissionTo('View ready to ship');

        $packaging->givePermissionTo('View confirmed 2');
        $packaging->givePermissionTo('View ready to ship');
        $packaging->givePermissionTo('set ready to ship');
        $packaging->givePermissionTo('set shipped');

        $operator->givePermissionTo('View confirmed 2');
        $operator->givePermissionTo('View ready to ship');
        $operator->givePermissionTo('change order status');

        $admin->givePermissionTo(Permission::all());
    }
}
