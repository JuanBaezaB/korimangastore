<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FormatController;
use App\Http\Controllers\EditorialController;
use App\Http\Controllers\GenreController;

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

/* Proveedor */

Route::get('/characteristics/index_provider', [ProviderController::class, 'index'])->name('list_provider');
Route::post('/characteristics/index_provider', [ProviderController::class, 'store'])->name('add_provider');
Route::delete('/characteristics/delete_provider/{id}', [ProviderController::class, 'destroy'])->name('delete_provider');
Route::patch('/characteristics/update_provider/{id}', [ProviderController::class, 'update'])->name('update_provider');

/* Manga-Formato */

Route::get('/manga_characteristics/index_format', [FormatController::class, 'index'])->name('list_format');
Route::post('/manga_characteristics/index_format', [FormatController::class, 'store'])->name('add_format');
Route::delete('/manga_characteristics/delete_format/{id}', [FormatController::class, 'destroy'])->name('delete_format');
Route::patch('/manga_characteristics/update_format/{id}', [FormatController::class, 'update'])->name('update_format');

/* Manga-Editorial */

Route::get('/manga_characteristics/index_editorial', [EditorialController::class, 'index'])->name('list_editorial');
Route::post('/manga_characteristics/index_editorial', [EditorialController::class, 'store'])->name('add_editorial');
Route::delete('/manga_characteristics/delete_editorial/{id}', [EditorialController::class, 'destroy'])->name('delete_editorial');
Route::patch('/manga_characteristics/update_editorial/{id}', [EditorialController::class, 'update'])->name('update_editorial');

/* Manga-Genero */

Route::get('/manga_characteristics/index_genre', [GenreController::class, 'index'])->name('list_genre');
Route::post('/manga_characteristics/index_genre', [GenreController::class, 'store'])->name('add_genre');
Route::delete('/manga_characteristics/delete_genre/{id}', [GenreController::class, 'destroy'])->name('delete_genre');
Route::patch('/manga_characteristics/update_genre/{id}', [GenreController::class, 'update'])->name('update_genre');


/* Producto */
Route::get('/product_management/list_product', [ProductController::class, 'index'])->name('lista_producto');

/* Sucursales */
Route::get('/characteristics/list_branch', [BranchController::class, 'index'])->name('list_branch');
Route::post('/characteristics/list_branch', [BranchController::class, 'store'])->name('add_branch');
Route::delete('/characteristics/delete_branch/{id}', [BranchController::class, 'destroy'])->name('delete_branch');
Route::patch('/characteristics/update_branch/{id}', [BranchController::class, 'update'])->name('update_branch');

/* Series */
Route::get('/characteristics/list_serie', [SerieController::class, 'index'])->name('list_serie');
Route::post('/characteristics/list_serie', [SerieController::class, 'store'])->name('add_serie');
Route::delete('/characteristics/delete_serie/{id}', [SerieController::class, 'destroy'])->name('delete_serie');
Route::patch('/characteristics/update_serie/{id}', [SerieController::class, 'update'])->name('update_serie');

/* Categorias */
Route::get('/characteristics/index_category', [CategoryController::class, 'index'])->name('list_category');
Route::post('/characteristics/index_category', [CategoryController::class, 'store'])->name('add_category');
Route::delete('/characteristics/delete_category/{id}', [CategoryController::class, 'destroy'])->name('delete_category');
Route::patch('/characteristics/update_category/{id}', [CategoryController::class, 'update'])->name('update_category');


/*  
Route::resource('/characteristics/list_branch',BranchController::class); */
