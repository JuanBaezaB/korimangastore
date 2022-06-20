<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\FormatController;
use App\Http\Controllers\EditorialController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\CreativePersonController;
use App\Http\Controllers\MangaController;
use App\Http\Controllers\FigureTypeController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SaleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('public.welcome');
});



Auth::routes();



Route::view('/forms/be_forms_elements', 'admin.forms.be_forms_elements')->middleware('auth');
Route::view('/forms/be_forms_layouts', 'admin.forms.be_forms_layouts')->middleware('auth');
Route::view('/forms/be_forms_input_groups', 'admin.forms.be_forms_input_groups')->middleware('auth');
Route::view('/forms/be_forms_plugins', 'admin.forms.be_forms_plugins')->middleware('auth');
Route::view('/forms/be_forms_editors', 'admin.forms.be_forms_editors')->middleware('auth');
Route::view('/forms/be_forms_validation', 'admin.forms.be_forms_validation')->middleware('auth');



Route::group(['middleware' => ['role:Admin|Vendedor']], function () { 

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    /* Producto */
    Route::get('/gestion-de-productos/producto', [ProductController::class, 'index'])->name('product.list')->middleware('can:product.list');
    Route::get('/gestion-de-productos/producto/crear', [ProductController::class, 'create'])->name('product.create')->middleware('can:product.modify');
    Route::post('/gestion-de-productos/producto/agregar', [ProductController::class, 'store'])->name('product.add')->middleware('can:product.modify');
    Route::get('/gestion-de-productos/producto/{id}/editar', [ProductController::class, 'edit'])->name('product.edit')->middleware('can:product.modify');
    Route::patch('/gestion-de-productos/producto/{id}/editar', [ProductController::class, 'update'])->name('product.update')->middleware('can:product.modify');
    Route::delete('/gestion-de-productos/producto/{id}/eliminar', [ProductController::class, 'destroy'])->name('product.delete')->middleware('can:product.modify');
    Route::post('/gestion-de-productos/producto/buscar', [ProductController::class, 'search'])->name('product.search')->middleware('auth');

    /* Stock */
    Route::get('/gestion-de-inventario/stock', [StockController::class, 'index'])->name('stock.list')->middleware('can:stock.list');
    Route::post('/gestion-de-inventario/stock', [StockController::class, 'list'])->name('stock.data_table')->middleware('can:stock.modify');
    Route::get('/gestion-de-inventario/stock/sucursal/{id}', [StockController::class, 'index'])->name('stock.get_one')->middleware('can:stock.modify');
    Route::get('/gestion-de-inventario/stock/crear', [StockController::class, 'create'])->name('stock.create')->middleware('can:stock.modify');
    Route::post('/gestion-de-inventario/stock/agregar', [StockController::class, 'store'])->name('stock.add')->middleware('can:stock.modify');

/* Sales */
Route::get('/area-de-ventas/venta', [SaleController::class, 'index'])->name('sale.list')->middleware('auth');
Route::post('/area-de-ventas/venta', [SaleController::class, 'list'])->name('sale.data_table')->middleware('auth');
Route::get('/area-de-ventas/venta/sucursal/{id}', [SaleController::class, 'index'])->name('sale.get_one')->middleware('auth');
Route::get('/area-de-ventas/venta/crear', [SaleController::class, 'create'])->name('sale.create')->middleware('auth');
Route::post('/area-de-ventas/venta/agregar', [SaleController::class, 'store'])->name('sale.add')->middleware('auth');


    /*  PRODUCT MANAGEMENT */

    /* General-Series */
    Route::get('/gestion-de-productos/carateristicas/general/serie', [SerieController::class, 'index'])->name('serie.list')->middleware('can:serie.list');
    Route::post('/gestion-de-productos/carateristicas/general/serie', [SerieController::class, 'store'])->name('serie.add')->middleware('can:serie.modify');
    Route::delete('/gestion-de-productos/carateristicas/general/eliminar-serie/{id}', [SerieController::class, 'destroy'])->name('serie.delete')->middleware('can:serie.modify');
    Route::patch('/gestion-de-productos/carateristicas/general/actualizar-serie/{id}', [SerieController::class, 'update'])->name('serie.update')->middleware('can:serie.modify');
    /* General-Categorias */
    Route::get('/gestion-de-productos/carateristicas/general/categoria', [CategoryController::class, 'index'])->name('category.list')->middleware('can:category.list');
    Route::post('/gestion-de-productos/carateristicas/general/categoria', [CategoryController::class, 'store'])->name('category.add')->middleware('can:category.modify');
    Route::delete('/gestion-de-productos/carateristicas/general/eliminar-categoria/{id}', [CategoryController::class, 'destroy'])->name('category.delete')->middleware('can:category.modify');
    Route::patch('/gestion-de-productos/carateristicas/general/actualizar-categoria/{id}', [CategoryController::class, 'update'])->name('category.update')->middleware('can:category.modify');


    /* Manga-Formato */
    Route::get('/gestion-de-productos/carateristicas/manga/formato', [FormatController::class, 'index'])->name('format.list')->middleware('can:format.list');
    Route::post('/gestion-de-productos/carateristicas/manga/formato', [FormatController::class, 'store'])->name('format.add')->middleware('can:format.modify');
    Route::delete('/gestion-de-productos/carateristicas/manga/eliminar-formato/{id}', [FormatController::class, 'destroy'])->name('format.delete')->middleware('can:format.modify');
    Route::patch('/gestion-de-productos/carateristicas/manga/actualizar-formato/{id}', [FormatController::class, 'update'])->name('format.update')->middleware('can:format.modify');
    /* Manga-Editorial */
    Route::get('/gestion-de-productos/carateristicas/manga/editorial', [EditorialController::class, 'index'])->name('editorial.list')->middleware('can:editorial.list');
    Route::post('/gestion-de-productos/carateristicas/general/editorial', [EditorialController::class, 'store'])->name('editorial.add')->middleware('can:editorial.modify');
    Route::post('/gestion-de-productos/carateristicas/general/editorial/uno', [EditorialController::class, 'get_one'])->name('editorial.get_one')->middleware('can:editorial.modify');
    Route::delete('/gestion-de-productos/carateristicas/general/eliminar-editorial/{id}', [EditorialController::class, 'destroy'])->name('editorial.delete')->middleware('can:editorial.modify');
    Route::patch('/gestion-de-productos/carateristicas/general/actualizar-editorial/{id}', [EditorialController::class, 'update'])->name('editorial.update')->middleware('can:editorial.modify');
    /* Manga-Genero */
    Route::get('/gestion-de-productos/carateristicas/manga/genre', [GenreController::class, 'index'])->name('genre.list')->middleware('can:genre.list');
    Route::post('/gestion-de-productos/carateristicas/manga/genre', [GenreController::class, 'store'])->name('genre.add')->middleware('can:genre.modify');
    Route::post('/gestion-de-productos/carateristicas/manga/genre/uno', [GenreController::class, 'get_one'])->name('genre.get_one')->middleware('can:genre.modify');
    Route::delete('/gestion-de-productos/carateristicas/manga/eliminar-genre/{id}', [GenreController::class, 'destroy'])->name('genre.delete')->middleware('can:genre.modify');
    Route::patch('/gestion-de-productos/carateristicas/manga/actualizar-genre/{id}', [GenreController::class, 'update'])->name('genre.update')->middleware('can:genre.modify');
    /* Manga-Creative People */
    Route::get('/gestion-de-productos/carateristicas/manga/persona-creativa', [CreativePersonController::class, 'index'])->name('creative_person.list')->middleware('can:creative_person.list');
    Route::post('/gestion-de-productos/carateristicas/manga/persona-creativa', [CreativePersonController::class, 'store'])->name('creative_person.add')->middleware('can:creative_person.modify');
    Route::delete('/gestion-de-productos/carateristicas/manga/eliminar-persona-creativa/{id}', [CreativePersonController::class, 'destroy'])->name('creative_person.delete')->middleware('can:creative_person.modify');
    Route::patch('/gestion-de-productos/carateristicas/manga/actualizar-creativa/{id}', [CreativePersonController::class, 'update'])->name('creative_person.update')->middleware('can:creative_person.modify');

    /* Figure-FigureType */
    Route::get('/gestion-de-productos/carateristicas/figura/tipo', [FigureTypeController::class, 'index'])->name('figure_type.list')->middleware('can:figure_type.list');
    Route::post('/gestion-de-productos/carateristicas/figura/tipo', [FigureTypeController::class, 'store'])->name('figure_type.add')->middleware('can:figure_type.modify');
    Route::delete('/gestion-de-productos/carateristicas/figura/tipo/{id}/eliminar', [FigureTypeController::class, 'destroy'])->name('figure_type.delete')->middleware('can:figure_type.modify');
    Route::patch('/gestion-de-productos/carateristicas/figura/tipo/{id}/editar', [FigureTypeController::class, 'update'])->name('figure_type.update')->middleware('can:figure_type.modify');




    /*  BASIC MANAGEMENT */
    /* Proveedor */
    Route::get('/gestion-base/configuracion-base/proveedores', [ProviderController::class, 'index'])->name('provider.list')->middleware('can:provider.list');
    Route::post('/gestion-base/configuracion-base/proveedores', [ProviderController::class, 'store'])->name('provider.add')->middleware('can:provider.modify');
    Route::delete('/gestion-base/configuracion-base/eliminar-proveedores/{id}', [ProviderController::class, 'destroy'])->name('provider.delete')->middleware('can:provider.modify');
    Route::patch('/gestion-base/configuracion-base/actualizar-proveedores/{id}', [ProviderController::class, 'update'])->name('provider.update')->middleware('can:provider.modify');
    /* Sucursales */
    Route::get('/gestion-base/configuracion-base/sucursales', [BranchController::class, 'index'])->name('branch.list')->middleware('can:branch.list');
    Route::post('/gestion-base/configuracion-base/sucursales', [BranchController::class, 'store'])->name('branch.add')->middleware('can:branch.modify');
    Route::post('/gestion-base/configuracion-base/sucursales/uno', [BranchController::class, 'get_one'])->name('branch.get_one')->middleware('can:branch.modify');
    Route::post('/gestion-base/configuacion-base/sucursales/buscar', [BranchController::class, 'search'])->name('branch.search')->middleware('can:branch.list');
    Route::delete('/gestion-base/configuracion-base/eliminar_sucursales/{id}', [BranchController::class, 'destroy'])->name('branch.delete')->middleware('can:branch.modify');
    Route::patch('/gestion-base/configuracion-base/actualizar_sucursales/{id}', [BranchController::class, 'update'])->name('branch.update')->middleware('can:branch.modify');
    /* Usuarios */
    Route::get('/gestion-base/gestion-usuarios/usuarios', [UserController::class, 'index'])->name('user.list')->middleware('can:user.list');
    Route::post('/gestion-base/gestion-usuarios/usuarios', [userController::class, 'store'])->name('user.add')->middleware('can:user.modify');
    Route::delete('/gestion-base/gestion-usuarios/eliminar-usuario/{id}', [UserController::class, 'destroy'])->name('user.delete')->middleware('can:user.modify');
    Route::patch('/gestion-base/gestion-usuarios/eliminar-usuario/{id}', [UserController::class, 'update'])->name('user.update')->middleware('can:user.modify');

    /* Roles */
    Route::get('/gestion-base/gestion-usuarios/roles', [RoleController::class, 'index'])->name('role.list')->middleware('can:role.list');
    Route::post('/gestion-base/gestion-usuarios/roles', [RoleController::class, 'store'])->name('role.add')->middleware('can:role.modify');
    Route::delete('/gestion-base/gestion-usuarios/roles/{id}', [RoleController::class, 'destroy'])->name('role.delete')->middleware('can:role.modify');
    Route::patch('/gestion-base/gestion-usuarios/roles/{id}', [RoleController::class, 'update'])->name('role.update')->middleware('can:role.modify');
    /* Permisos */
    Route::get('/gestion-base/gestion-usuarios/permisos', [PermissionController::class, 'index'])->name('permission.list')->middleware('can:permission.list');
    Route::post('/gestion-base/gestion-usuarios/permisos', [PermissionController::class, 'store'])->name('permission.add')->middleware('can:permission.modify');
    Route::delete('/gestion-base/gestion-usuarios/permisos/{id}', [PermissionController::class, 'destroy'])->name('permission.delete')->middleware('can:permission.modify');
    Route::patch('/gestion-base/gestion-usuarios/permisos/{id}', [PermissionController::class, 'update'])->name('permission.update')->middleware('can:permission.modify');

    /*  Soporte */
    Route::view('/soporte/preguntas-frecuentes-admin', 'admin.support.adminfaq')->name('support.adminfaq')->middleware('auth');
    Route::view('/soporte/manual-admin', 'admin.support.adminmanual')->name('support.adminmanual')->middleware('auth');

});

/*  graficos */
Route::get('/gestion-base/configuacion-base/venta', [SaleController::class, 'index'])->name('sale.list')->middleware('auth');
Route::get('/gestion-base/configuacion-base/venta/grafico', [SaleController::class, 'charts'])->name('sale.graphic')->middleware('auth');
