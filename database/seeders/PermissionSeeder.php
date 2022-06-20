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
        /* Producto */
        Permission::Create([
            'name'=>'product.list',
            'display_name'=>'Ver productos',
            'group'=>'Producto',
            'description'=>'Permite visualizar los productos existentes.'
        ])->assignRole('Admin');
        Permission::Create([
            'name'=>'product.modify',
            'display_name'=>'Modificar productos',
            'group'=>'Producto',
            'description'=>'Permite ingresar, actualizar y eliminar productos.'
        ])->assignRole('Admin');
        
        /* Stock */
        Permission::Create([
            'name'=>'stock.list',
            'display_name'=>'Ver stock',
            'group'=>'Stock',
            'description'=>'Permite visualizar el stock del inventario.'
        ])->assignRole('Admin');
        Permission::Create([
            'name'=>'stock.modify',
            'display_name'=>'Modificar stock',
            'group'=>'Stock',
            'description'=>'Permite ingresar, actualizar y eliminar stock.'
        ])->assignRole('Admin');
        
        /* Proveedor */
        Permission::Create([
            'name'=>'provider.list',
            'display_name'=>'Ver proveedores',
            'group'=>'Proveedor',
            'description'=>'Permite visualizar los proveedores existentes.'
        ])->assignRole('Admin');
        Permission::Create([
            'name'=>'provider.modify',
            'display_name'=>'Modificar proveedores',
            'group'=>'Proveedor',
            'description'=>'Permite ingresar, actualizar y eliminar proveedores.'
        ])->assignRole('Admin');

        /* Sucursales */
        Permission::Create([
            'name'=>'branch.list',
            'display_name'=>'Ver sucursales',
            'group'=>'Sucursal',
            'description'=>'Permite visualizar las sucursales existentes.'
        ])->assignRole('Admin');
        Permission::Create([
            'name'=>'branch.modify',
            'display_name'=>'Modificar sucursales',
            'group'=>'Sucursal',
            'description'=>'Permite ingresar, actualizar y eliminar sucursales.'
        ])->assignRole('Admin');

        /* Usuario */
        Permission::Create([
            'name'=>'user.list',
            'display_name'=>'Ver usuarios',
            'group'=>'Usuario',
            'description'=>'Permite visualizar las usuarios registrados.'
        ])->assignRole('Admin');
        Permission::Create([
            'name'=>'user.modify',
            'display_name'=>'Modificar usuarios',
            'group'=>'Usuario',
            'description'=>'Permite ingresar, actualizar y eliminar usuarios.'
        ])->assignRole('Admin');
        
        /* Rol */
        Permission::Create([
            'name'=>'role.list',
            'display_name'=>'Ver roles',
            'group'=>'Rol',
            'description'=>'Permite visualizar las roles existentes.'
        ])->assignRole('Admin');
        Permission::Create([
            'name'=>'role.modify',
            'display_name'=>'Modificar roles',
            'group'=>'Rol',
            'description'=>'Permite ingresar, actualizar y eliminar roles.'
        ])->assignRole('Admin');

        /* Permisos */
        Permission::Create([
            'name'=>'permission.list',
            'display_name'=>'Ver permisos',
            'group'=>'Permiso',
            'description'=>'Permite visualizar las permisos existentes.'
        ])->assignRole('Admin');
        Permission::Create([
            'name'=>'permission.modify',
            'display_name'=>'Modificar permisos',
            'group'=>'Permiso',
            'description'=>'Permite ingresar, actualizar y eliminar permisos.'
        ])->assignRole('Admin');

        /* Figura */
        Permission::Create([
            'name'=>'figure_type.list',
            'display_name'=>'Ver tipos de figuras',
            'group'=>'Tipo de figura',
            'description'=>'Permite visualizar los tipo de figuras existentes.'
        ])->assignRole('Admin');
        Permission::Create([
            'name'=>'figure_type.modify',
            'display_name'=>'Modificar tipo de figuras',
            'group'=>'Tipo de figura',
            'description'=>'Permite ingresar, actualizar y eliminar tipo de figuras.'
        ])->assignRole('Admin');

        /* Persona creativa */
        Permission::Create([
            'name'=>'creative_person.list',
            'display_name'=>'Ver personas creativas',
            'group'=>'Persona creativa',
            'description'=>'Permite visualizar los personas creativas existentes.'
        ])->assignRole('Admin');
        Permission::Create([
            'name'=>'creative_person.modify',
            'display_name'=>'Modificar personas creativas',
            'group'=>'Persona creativa',
            'description'=>'Permite ingresar, actualizar y eliminar persona creativa.'
        ])->assignRole('Admin');

         /* Formato */
         Permission::Create([
            'name'=>'format.list',
            'display_name'=>'Ver formatos',
            'group'=>'Formato',
            'description'=>'Permite visualizar los formatos existentes.'
        ])->assignRole('Admin');
        Permission::Create([
            'name'=>'format.modify',
            'display_name'=>'Modificar formatos',
            'group'=>'Formato',
            'description'=>'Permite ingresar, actualizar y eliminar formatos.'
        ])->assignRole('Admin');

         /* Editorial */
         Permission::Create([
            'name'=>'editorial.list',
            'display_name'=>'Ver editoriales',
            'group'=>'Editorial',
            'description'=>'Permite visualizar las editoriales existentes.'
        ])->assignRole('Admin');
        Permission::Create([
            'name'=>'editorial.modify',
            'display_name'=>'Modificar editoriales',
            'group'=>'Editorial',
            'description'=>'Permite ingresar, actualizar y eliminar editoriales.'
        ])->assignRole('Admin');

        /* Genero */
        Permission::Create([
            'name'=>'genre.list',
            'display_name'=>'Ver generos',
            'group'=>'Genero',
            'description'=>'Permite visualizar los generos existentes.'
        ])->assignRole('Admin');
        Permission::Create([
            'name'=>'genre.modify',
            'display_name'=>'Modificar generos',
            'group'=>'Genero',
            'description'=>'Permite ingresar, actualizar y eliminar generos.'
        ])->assignRole('Admin');

        /* Serie */
        Permission::Create([
            'name'=>'serie.list',
            'display_name'=>'Ver series',
            'group'=>'Serie',
            'description'=>'Permite visualizar las series existentes.'
        ])->assignRole('Admin');
        Permission::Create([
            'name'=>'serie.modify',
            'display_name'=>'Modificar series',
            'group'=>'Serie',
            'description'=>'Permite ingresar, actualizar y eliminar series.'
        ])->assignRole('Admin');

        /* Categoria */
        Permission::Create([
            'name'=>'category.list',
            'display_name'=>'Ver categorias',
            'group'=>'Categoria',
            'description'=>'Permite visualizar las categorias existentes.'
        ])->assignRole('Admin');
        Permission::Create([
            'name'=>'category.modify',
            'display_name'=>'Modificar categorias',
            'group'=>'Categoria',
            'description'=>'Permite ingresar, actualizar y eliminar categorias.'
        ])->assignRole('Admin');
        /*
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
        Permission::Create(['name'=>'category.add']);*/
    }
}
