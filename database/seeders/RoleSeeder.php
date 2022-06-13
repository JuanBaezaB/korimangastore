<?php

namespace Database\Seeders;

use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleadmin = Role::create(['name'=>'Admin']);
        $roleseller = Role::create(['name'=>'Vendedor']);
        $rolePublic = Role::create(['name'=>'User']);
        Permission::Create(['name'=>'product.list'])->syncRoles([$roleadmin]);
        Permission::Create(['name'=>'product.create']);
        Permission::Create(['name'=>'product.add']);
        Permission::Create(['name'=>'product.delete']);
        Permission::Create(['name'=>'product.edit']);



    }
}
