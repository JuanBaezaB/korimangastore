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

/* Proveedor */

Route::get('/characteristics/index_provider', [ProviderController::class, 'index'])->name('list_provider')->middleware('auth');
Route::post('/characteristics/index_provider', [ProviderController::class, 'store'])->name('add_provider')->middleware('auth');
Route::delete('/characteristics/delete_provider/{id}', [ProviderController::class, 'destroy'])->name('delete_provider')->middleware('auth');
Route::patch('/characteristics/update_provider/{id}', [ProviderController::class, 'update'])->name('update_provider')->middleware('auth');

/* Manga-Formato */

Route::get('/manga_characteristics/index_format', [FormatController::class, 'index'])->name('list_format')->middleware('auth');
Route::post('/manga_characteristics/index_format', [FormatController::class, 'store'])->name('add_format')->middleware('auth');
Route::delete('/manga_characteristics/delete_format/{id}', [FormatController::class, 'destroy'])->name('delete_format')->middleware('auth');
Route::patch('/manga_characteristics/update_format/{id}', [FormatController::class, 'update'])->name('update_format')->middleware('auth');

/* Manga-Editorial */

Route::get('/manga_characteristics/index_editorial', [EditorialController::class, 'index'])->name('list_editorial')->middleware('auth');
Route::post('/manga_characteristics/index_editorial', [EditorialController::class, 'store'])->name('add_editorial')->middleware('auth');
Route::delete('/manga_characteristics/delete_editorial/{id}', [EditorialController::class, 'destroy'])->name('delete_editorial')->middleware('auth');
Route::patch('/manga_characteristics/update_editorial/{id}', [EditorialController::class, 'update'])->name('update_editorial')->middleware('auth');

/* Manga-Genero */

Route::get('/manga_characteristics/index_genre', [GenreController::class, 'index'])->name('list_genre')->middleware('auth');
Route::post('/manga_characteristics/index_genre', [GenreController::class, 'store'])->name('add_genre')->middleware('auth');
Route::delete('/manga_characteristics/delete_genre/{id}', [GenreController::class, 'destroy'])->name('delete_genre')->middleware('auth');
Route::patch('/manga_characteristics/update_genre/{id}', [GenreController::class, 'update'])->name('update_genre')->middleware('auth');


/* Producto */
Route::get('/product_management/list_product', [ProductController::class, 'index'])->name('lista_producto')->middleware('auth');

/* Sucursales */
Route::get('/characteristics/list_branch', [BranchController::class, 'index'])->name('list_branch')->middleware('auth');
Route::post('/characteristics/list_branch', [BranchController::class, 'store'])->name('add_branch')->middleware('auth');
Route::delete('/characteristics/delete_branch/{id}', [BranchController::class, 'destroy'])->name('delete_branch')->middleware('auth');
Route::patch('/characteristics/update_branch/{id}', [BranchController::class, 'update'])->name('update_branch')->middleware('auth');

/* Series */
Route::get('/characteristics/list_serie', [SerieController::class, 'index'])->name('list_serie')->middleware('auth');
Route::post('/characteristics/list_serie', [SerieController::class, 'store'])->name('add_serie')->middleware('auth');
Route::delete('/characteristics/delete_serie/{id}', [SerieController::class, 'destroy'])->name('delete_serie')->middleware('auth');
Route::patch('/characteristics/update_serie/{id}', [SerieController::class, 'update'])->name('update_serie')->middleware('auth');

/* Categorias */
Route::get('/characteristics/index_category', [CategoryController::class, 'index'])->name('list_category')->middleware('auth');
Route::post('/characteristics/index_category', [CategoryController::class, 'store'])->name('add_category')->middleware('auth');
Route::delete('/characteristics/delete_category/{id}', [CategoryController::class, 'destroy'])->name('delete_category')->middleware('auth');
Route::patch('/characteristics/update_category/{id}', [CategoryController::class, 'update'])->name('update_category')->middleware('auth');


/*  
Route::resource('/characteristics/list_branch',BranchController::class); */

/* Creative People */
Route::get('/characteristics/list_creative_person', [CreativePersonController::class, 'index'])->name('list_creative_person')->middleware('auth');
Route::post('/characteristics/list_creative_person', [CreativePersonController::class, 'store'])->name('add_creative_person')->middleware('auth');
Route::delete('/characteristics/delete_creative_person/{id}', [CreativePersonController::class, 'destroy'])->name('delete_creative_person')->middleware('auth');
Route::patch('/characteristics/update_creative_person/{id}', [CreativePersonController::class, 'update'])->name('update_creative_person')->middleware('auth');

/* Manga */
Route::get('/characteristics/manga', [MangaController::class, 'create'])->name('create_manga')->middleware('auth');

