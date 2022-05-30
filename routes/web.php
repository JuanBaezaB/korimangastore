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


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('/forms/be_forms_elements', 'admin.forms.be_forms_elements')->middleware('auth');
Route::view('/forms/be_forms_layouts', 'admin.forms.be_forms_layouts')->middleware('auth');
Route::view('/forms/be_forms_input_groups', 'admin.forms.be_forms_input_groups')->middleware('auth');
Route::view('/forms/be_forms_plugins', 'admin.forms.be_forms_plugins')->middleware('auth');
Route::view('/forms/be_forms_editors', 'admin.forms.be_forms_editors')->middleware('auth');
Route::view('/forms/be_forms_validation', 'admin.forms.be_forms_validation')->middleware('auth');



/* Producto */
Route::get('/gestion-de-productos/producto', [ProductController::class, 'index'])->name('lista_producto')->middleware('auth');
Route::get('/gestion-de-productos/producto/crear', [ProductController::class, 'create'])->name('create_product')->middleware('auth');
Route::post('/gestion-de-productos/producto/agregar', [ProductController::class, 'store'])->name('add_product')->middleware('auth');
Route::get('/gestion-de-productos/producto/{id}/editar', [ProductController::class, 'edit'])->name('edit_product')->middleware('auth');
Route::patch('/gestion-de-productos/producto/{id}/editar', [ProductController::class, 'update'])->name('update_product')->middleware('auth');
Route::delete('/gestion-de-productos/producto/{id}/eliminar', [ProductController::class, 'destroy'])->name('delete_product')->middleware('auth');



/*  BASIC MANAGEMENT */

/* Proveedor */
Route::get('/gestion-base/configuacion-base/proveedores', [ProviderController::class, 'index'])->name('list_provider')->middleware('auth');
Route::post('/gestion-base/configuacion-base/proveedores', [ProviderController::class, 'store'])->name('add_provider')->middleware('auth');
Route::delete('/gestion-base/configuacion-base/eliminar-proveedores/{id}', [ProviderController::class, 'destroy'])->name('delete_provider')->middleware('auth');
Route::patch('/gestion-base/configuacion-base/actualizar-proveedores/{id}', [ProviderController::class, 'update'])->name('update_provider')->middleware('auth');
/* Sucursales */
Route::get('/gestion-base/configuacion-base/sucursales', [BranchController::class, 'index'])->name('list_branch')->middleware('auth');
Route::post('/gestion-base/configuacion-base/sucursales', [BranchController::class, 'store'])->name('add_branch')->middleware('auth');
Route::delete('/gestion-base/configuacion-base/eliminar_sucursales/{id}', [BranchController::class, 'destroy'])->name('delete_branch')->middleware('auth');
Route::patch('/gestion-base/configuacion-base/actualizar_sucursales/{id}', [BranchController::class, 'update'])->name('update_branch')->middleware('auth');



/*  PRODUCT MANAGEMENT */

/* Manga-Formato */
Route::get('/gestion-de-productos/carateristicas/manga/formato', [FormatController::class, 'index'])->name('list_format')->middleware('auth');
Route::post('/gestion-de-productos/carateristicas/manga/formato', [FormatController::class, 'store'])->name('add_format')->middleware('auth');
Route::delete('/gestion-de-productos/carateristicas/manga/eliminar-formato/{id}', [FormatController::class, 'destroy'])->name('delete_format')->middleware('auth');
Route::patch('/gestion-de-productos/carateristicas/manga/actualizar-formato/{id}', [FormatController::class, 'update'])->name('update_format')->middleware('auth');
/* Manga-Editorial */
Route::get('/gestion-de-productos/carateristicas/manga/editorial', [EditorialController::class, 'index'])->name('list_editorial')->middleware('auth');
Route::post('/gestion-de-productos/carateristicas/general/editorial', [EditorialController::class, 'store'])->name('add_editorial')->middleware('auth');
Route::delete('/gestion-de-productos/carateristicas/general/eliminar-editorial/{id}', [EditorialController::class, 'destroy'])->name('delete_editorial')->middleware('auth');
Route::patch('/gestion-de-productos/carateristicas/general/actualizar-editorial/{id}', [EditorialController::class, 'update'])->name('update_editorial')->middleware('auth');
/* Manga-Genero */
Route::get('/gestion-de-productos/carateristicas/manga/genre', [GenreController::class, 'index'])->name('list_genre')->middleware('auth');
Route::post('/gestion-de-productos/carateristicas/manga/genre', [GenreController::class, 'store'])->name('add_genre')->middleware('auth');
Route::delete('/gestion-de-productos/carateristicas/manga/eliminar-genre/{id}', [GenreController::class, 'destroy'])->name('delete_genre')->middleware('auth');
Route::patch('/gestion-de-productos/carateristicas/manga/actualizar-genre/{id}', [GenreController::class, 'update'])->name('update_genre')->middleware('auth');
/* Manga-Creative People */
Route::get('/gestion-de-productos/carateristicas/manga/persona-creativa', [CreativePersonController::class, 'index'])->name('list_creative_person')->middleware('auth');
Route::post('/gestion-de-productos/carateristicas/manga/persona-creativa', [CreativePersonController::class, 'store'])->name('add_creative_person')->middleware('auth');
Route::delete('/gestion-de-productos/carateristicas/manga/eliminar-persona-creativa/{id}', [CreativePersonController::class, 'destroy'])->name('delete_creative_person')->middleware('auth');
Route::patch('/gestion-de-productos/carateristicas/manga/actualizar-creativa/{id}', [CreativePersonController::class, 'update'])->name('update_creative_person')->middleware('auth');

/* General-Series */
Route::get('/gestion-de-productos/carateristicas/general/serie', [SerieController::class, 'index'])->name('list_serie')->middleware('auth');
Route::post('/gestion-de-productos/carateristicas/general/serie', [SerieController::class, 'store'])->name('add_serie')->middleware('auth');
Route::delete('/gestion-de-productos/carateristicas/general/eliminar-serie/{id}', [SerieController::class, 'destroy'])->name('delete_serie')->middleware('auth');
Route::patch('/gestion-de-productos/carateristicas/general/actualizar-serie/{id}', [SerieController::class, 'update'])->name('update_serie')->middleware('auth');
/* General-Categorias */
Route::get('/gestion-de-productos/carateristicas/general/categoria', [CategoryController::class, 'index'])->name('list_category')->middleware('auth');
Route::post('/gestion-de-productos/carateristicas/general/categoria', [CategoryController::class, 'store'])->name('add_category')->middleware('auth');
Route::delete('/gestion-de-productos/carateristicas/general/eliminar-categoria/{id}', [CategoryController::class, 'destroy'])->name('delete_category')->middleware('auth');
Route::patch('/gestion-de-productos/carateristicas/general/actualizar-categoria/{id}', [CategoryController::class, 'update'])->name('update_category')->middleware('auth');
