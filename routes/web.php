<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\SerieController;

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
/*
Route::resource('/provider', ProviderController::class)->middleware('auth');
Route::view('/provider/create', 'admin.provider.create')->middleware('auth');
Route::view('/provider/edit', 'admin.provider.edit')->middleware('auth');
Route::view('/provider/form', 'admin.provider.create')->middleware('auth');
Route::view('/provider/index', 'admin.provider.index')->middleware('auth');
Route::view('/provider/show', 'admin.provider.show')->middleware('auth');
*/

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

/*  
Route::resource('/characteristics/list_branch',BranchController::class); */
