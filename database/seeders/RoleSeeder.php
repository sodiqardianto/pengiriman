<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'create-role']);
        Permission::create(['name' => 'read-role']);
        Permission::create(['name' => 'update-role']);
        Permission::create(['name' => 'delete-role']);

        Permission::create(['name' => 'create-zona']);
        Permission::create(['name' => 'read-zona']);
        Permission::create(['name' => 'update-zona']);
        Permission::create(['name' => 'delete-zona']);

        Permission::create(['name' => 'create-kota']);
        Permission::create(['name' => 'read-kota']);
        Permission::create(['name' => 'update-kota']);
        Permission::create(['name' => 'delete-kota']);

        Permission::create(['name' => 'create-transaksi']);
        Permission::create(['name' => 'read-transaksi']);
        Permission::create(['name' => 'update-transaksi']);
        Permission::create(['name' => 'delete-transaksi']);

        Permission::create(['name' => 'create-laporan']);
        Permission::create(['name' => 'read-laporan']);
        Permission::create(['name' => 'update-laporan']);
        Permission::create(['name' => 'delete-laporan']);

        $role_admin = Role::create([
            'name'          =>  'superadmin',
            'guard_name'    =>  'web'
        ]);
        $role_admin->givePermissionTo(Permission::all());

        $role_user = Role::create([
            'name'          =>  'user',
            'guard_name'    =>  'web'
        ]);
        $role_user->givePermissionTo([
            'create-transaksi',
            'read-transaksi',
            'update-transaksi',
            'delete-transaksi',
        ]);

        $role_finance = Role::create([
            'name'          =>  'finance',
            'guard_name'    =>  'web'
        ]);
        $role_finance->givePermissionTo([
            'create-laporan',
            'read-laporan',
            'update-laporan',
            'delete-laporan',
        ]);
    }
}
