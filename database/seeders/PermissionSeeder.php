<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        Permission::Create(['name'=>'product.list'])->assignRole('Admin');
        Permission::Create(['name'=>'product.create']);
        Permission::Create(['name'=>'product.add']);
        Permission::Create(['name'=>'product.delete']);
        Permission::Create(['name'=>'product.update']);
        Permission::Create(['name'=>'product.edit']);
        
        Permission::Create(['name'=>'stock.list'])->assignRole('Admin');
        Permission::Create(['name'=>'stock.data_table']);
        Permission::Create(['name'=>'stock.get_one']);
        Permission::Create(['name'=>'stock.create']);
        Permission::Create(['name'=>'stock.add']);

        Permission::Create(['name'=>'provider.list'])->assignRole('Admin');
        Permission::Create(['name'=>'provider.delete']);
        Permission::Create(['name'=>'provider.update']);
        Permission::Create(['name'=>'provider.add']);

        Permission::Create(['name'=>'branch.list'])->assignRole('Admin');
        Permission::Create(['name'=>'branch.delete']);
        Permission::Create(['name'=>'branch.update']);
        Permission::Create(['name'=>'branch.add']);
        Permission::Create(['name'=>'branch.get_one']);

        Permission::Create(['name'=>'user.list'])->assignRole('Admin');
        Permission::Create(['name'=>'user.delete'])->assignRole('Admin');
        Permission::Create(['name'=>'user.update'])->assignRole('Admin');
        Permission::Create(['name'=>'user.add'])->assignRole('Admin');
        
        Permission::Create(['name'=>'role.list'])->assignRole('Admin');
        Permission::Create(['name'=>'role.delete'])->assignRole('Admin');
        Permission::Create(['name'=>'role.update'])->assignRole('Admin');
        Permission::Create(['name'=>'role.add'])->assignRole('Admin');

        Permission::Create(['name'=>'permission.list'])->assignRole('Admin');
        Permission::Create(['name'=>'permission.delete'])->assignRole('Admin');
        Permission::Create(['name'=>'permission.update'])->assignRole('Admin');
        Permission::Create(['name'=>'permission.add'])->assignRole('Admin');
        
        Permission::Create(['name'=>'figure_type.list'])->assignRole('Admin');
        Permission::Create(['name'=>'figure_type.delete']);
        Permission::Create(['name'=>'figure_type.update']);
        Permission::Create(['name'=>'figure_type.add']);

        Permission::Create(['name'=>'creative_person.list'])->assignRole('Admin');
        Permission::Create(['name'=>'creative_person.delete']);
        Permission::Create(['name'=>'creative_person.update']);
        Permission::Create(['name'=>'creative_person.add']);

        Permission::Create(['name'=>'format.list'])->assignRole('Admin');
        Permission::Create(['name'=>'format.delete']);
        Permission::Create(['name'=>'format.update']);
        Permission::Create(['name'=>'format.add']);

        Permission::Create(['name'=>'editorial.list'])->assignRole('Admin');
        Permission::Create(['name'=>'editorial.delete']);
        Permission::Create(['name'=>'editorial.update']);
        Permission::Create(['name'=>'editorial.add']);

        Permission::Create(['name'=>'genre.list'])->assignRole('Admin');
        Permission::Create(['name'=>'genre.delete']);
        Permission::Create(['name'=>'genre.update']);
        Permission::Create(['name'=>'genre.add']);
        Permission::Create(['name'=>'genre.get_one']);

        Permission::Create(['name'=>'serie.list'])->assignRole('Admin');
        Permission::Create(['name'=>'serie.delete']);
        Permission::Create(['name'=>'serie.update']);
        Permission::Create(['name'=>'serie.add']);

        Permission::Create(['name'=>'category.list'])->assignRole('Admin');
        Permission::Create(['name'=>'category.delete']);
        Permission::Create(['name'=>'category.update']);
        Permission::Create(['name'=>'category.add']);
    }
}
