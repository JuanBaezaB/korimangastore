<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CategoryController;

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
Route::get('/product_management/list_product', [ProductController::class, 'index'])->name('lista_producto');

/* Sucursales */
Route::get('/characteristics/list_branch', [BranchController::class, 'index'])->name('list_branch');
Route::post('/characteristics/list_branch', [BranchController::class, 'store'])->name('add_branch');
Route::delete('/characteristics/delete_branch/{id}', [BranchController::class, 'destroy'])->name('delete_branch');
Route::patch('/characteristics/update_branch/{id}', [BranchController::class, 'update'])->name('update_branch');

/* Categorias */
Route::get('/characteristics/index_category', [CategoryController::class, 'index'])->name('list_category');
Route::post('/characteristics/index_category', [CategoryController::class, 'store'])->name('add_category');
Route::delete('/characteristics/delete_category/{id}', [CategoryController::class, 'destroy'])->name('delete_category');
Route::patch('/characteristics/update_category/{id}', [CategoryController::class, 'update'])->name('update_category');


/*  
Route::resource('/characteristics/list_branch',BranchController::class); */
