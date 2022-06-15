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
        Permission::Create(['name'=>'product.update']);
        Permission::Create(['name'=>'product.edit']);
        
        Permission::Create(['name'=>'stock.list']);
        Permission::Create(['name'=>'stock.data_table']);
        Permission::Create(['name'=>'stock.get_one']);
        Permission::Create(['name'=>'stock.create']);
        Permission::Create(['name'=>'stock.add']);

        Permission::Create(['name'=>'provider.list']);
        Permission::Create(['name'=>'provider.delete']);
        Permission::Create(['name'=>'provider.update']);
        Permission::Create(['name'=>'provider.add']);

        Permission::Create(['name'=>'branch.list']);
        Permission::Create(['name'=>'branch.delete']);
        Permission::Create(['name'=>'branch.update']);
        Permission::Create(['name'=>'branch.add']);
        Permission::Create(['name'=>'branch.get_one']);

        Permission::Create(['name'=>'user.list'])->syncRoles([$roleadmin]);
        Permission::Create(['name'=>'user.delete'])->syncRoles([$roleadmin]);
        Permission::Create(['name'=>'user.update'])->syncRoles([$roleadmin]);
        Permission::Create(['name'=>'user.add'])->syncRoles([$roleadmin]);
        
        Permission::Create(['name'=>'role.list'])->syncRoles([$roleadmin]);
        Permission::Create(['name'=>'role.delete'])->syncRoles([$roleadmin]);
        Permission::Create(['name'=>'role.update'])->syncRoles([$roleadmin]);
        Permission::Create(['name'=>'role.add'])->syncRoles([$roleadmin]);

        Permission::Create(['name'=>'permission.list'])->syncRoles([$roleadmin]);
        Permission::Create(['name'=>'permission.delete']);
        Permission::Create(['name'=>'permission.update']);
        Permission::Create(['name'=>'permission.add']);
        
        Permission::Create(['name'=>'figure_type.list'])->syncRoles([$roleadmin]);
        Permission::Create(['name'=>'figure_type.delete']);
        Permission::Create(['name'=>'figure_type.update']);
        Permission::Create(['name'=>'figure_type.add']);

        Permission::Create(['name'=>'creative_person.list'])->syncRoles([$roleadmin]);
        Permission::Create(['name'=>'creative_person.delete']);
        Permission::Create(['name'=>'creative_person.update']);
        Permission::Create(['name'=>'creative_person.add']);

        Permission::Create(['name'=>'format.list'])->syncRoles([$roleadmin]);
        Permission::Create(['name'=>'format.delete']);
        Permission::Create(['name'=>'format.update']);
        Permission::Create(['name'=>'format.add']);

        Permission::Create(['name'=>'editorial.list'])->syncRoles([$roleadmin]);
        Permission::Create(['name'=>'editorial.delete']);
        Permission::Create(['name'=>'editorial.update']);
        Permission::Create(['name'=>'editorial.add']);

        Permission::Create(['name'=>'genre.list'])->syncRoles([$roleadmin]);
        Permission::Create(['name'=>'genre.delete']);
        Permission::Create(['name'=>'genre.update']);
        Permission::Create(['name'=>'genre.add']);
        Permission::Create(['name'=>'genre.get_one']);

        Permission::Create(['name'=>'serie.list'])->syncRoles([$roleadmin]);
        Permission::Create(['name'=>'serie.delete']);
        Permission::Create(['name'=>'serie.update']);
        Permission::Create(['name'=>'serie.add']);

        Permission::Create(['name'=>'category.list'])->syncRoles([$roleadmin]);
        Permission::Create(['name'=>'category.delete']);
        Permission::Create(['name'=>'category.update']);
        Permission::Create(['name'=>'category.add']);



    }
}
