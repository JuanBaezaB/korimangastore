<?php

use Illuminate\Support\Facades\Route;

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

Route::view('/forms/be_forms_elements', 'admin.forms.be_forms_elements');
Route::view('/forms/be_forms_layouts', 'admin.forms.be_forms_layouts');
Route::view('/forms/be_forms_input_groups', 'admin.forms.be_forms_input_groups');
Route::view('/forms/be_forms_plugins', 'admin.forms.be_forms_plugins');
Route::view('/forms/be_forms_editors', 'admin.forms.be_forms_editors');