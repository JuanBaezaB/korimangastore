<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FormatController;
use App\Http\Controllers\EditorialController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\CreativePersonController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MangaController;
use App\Http\Controllers\FigureTypeController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserQuestionController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [HomeController::class, 'index'])->name('index.home');
Route::get('/ver-producto/{id}', [HomeController::class, 'showProduct'])->name('show-product');

Route::view('/productos', 'public.products')->name('productos');

/*  Nosotros */
Route::view('/nosotros', 'public.about-us')->name('about-us');

/*  Articulo */
Route::view('/articulo', 'public.article')->name('article');

/*  Soporte */
Route::get('/soporte', [UserQuestionController::class, 'index'])->name('user-support');
Route::post('/soporte', [UserQuestionController::class, 'question'])->name('user-question-pub');
Route::get('/preguntas-frecuentes', [UserQuestionController::class, 'visible'])->name('user-questions.visible');
Route::view('/preguntas-frecuentes/ingreso-exitoso', 'public.userfaq-success')->name('userfaq-success');

/*  Soporte */
//Route::view('/preguntas-frecuentes', 'public.faq')->name('user-faq');

/*  Carrito */
Route::get('/add-cart', [CartController::class, 'add'])->name('cart.add');
Route::view('/listado-carrito','public.cart')->name('cart.list');
Route::post('/update-cart', [CartController::class, 'update'])->name('cart.update');
Route::post('/remove-cart', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/clear-cart', [CartController::class, 'clear'])->name('cart.clear');


/*  Reserva  (No va aquí, pero mientras dejé su vista pública) */
Route::view('/reserva', 'public.booking')->name('user-booking');


Auth::routes();


Route::view('/forms/be_forms_elements', 'admin.forms.be_forms_elements')->middleware('auth');
Route::view('/forms/be_forms_layouts', 'admin.forms.be_forms_layouts')->middleware('auth');
Route::view('/forms/be_forms_input_groups', 'admin.forms.be_forms_input_groups')->middleware('auth');
Route::view('/forms/be_forms_plugins', 'admin.forms.be_forms_plugins')->middleware('auth');
Route::view('/forms/be_forms_editors', 'admin.forms.be_forms_editors')->middleware('auth');
Route::view('/forms/be_forms_validation', 'admin.forms.be_forms_validation')->middleware('auth');

Route::group(['middleware' => ['role:User|Admin|Vendedor']], function () {

    /*Perfil De Usuario Cliente*/
    Route::get('/perfil-de-usuario', [UserController::class, 'clienteProfile'])->name('cliente.profile')->middleware();
    Route::patch('/contrasena', [UserController::class, 'clienteEditPassword'])->name('cliente.editPassword')->middleware();
    Route::patch('/perfil-de-usuario/editar/{id}', [UserController::class, 'clienteEditProfile'])->name('cliente.editProfile')->middleware();


});


Route::group(['middleware' => ['role:Admin|Vendedor']], function () {

    /*Dashboard*/
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('index.graphic');

     /*Notificaciones*/
    Route::post('/mark-as-read', [NotificationController::class, 'markNotification'])->name('markNotification');

    /* Producto */
    Route::get('/gestion-de-productos/producto', [ProductController::class, 'index'])->name('product.list')->middleware('can:product.list');
    Route::get('/gestion-de-productos/producto/crear', [ProductController::class, 'create'])->name('product.create')->middleware('can:product.modify');
    Route::post('/gestion-de-productos/producto/agregar', [ProductController::class, 'store'])->name('product.add')->middleware('can:product.modify');
    Route::get('/gestion-de-productos/producto/{id}/editar', [ProductController::class, 'edit'])->name('product.edit')->middleware('can:product.modify');
    Route::patch('/gestion-de-productos/producto/{id}/editar', [ProductController::class, 'update'])->name('product.update')->middleware('can:product.modify');
    Route::delete('/gestion-de-productos/producto/{id}/eliminar', [ProductController::class, 'destroy'])->name('product.delete')->middleware('can:product.modify');
    Route::post('/gestion-de-productos/producto/buscar', [ProductController::class, 'search'])->name('product.search')->middleware('auth');
    /* Importar producto */
    Route::view('/gestion-de-productos/producto/importar', 'admin.product_management.import_products')->name('product.import')->middleware('can:product.modify');
    Route::post('/importar-manga', [ProductController::class, 'mangaimport'])->name('product.mangaimport')->middleware('can:product.modify');
    Route::post('/importar-product', [ProductController::class, 'productimport'])->name('product.genericimport')->middleware('can:product.modify');
    Route::post('/importar-figure', [ProductController::class, 'figureimport'])->name('product.figureimport')->middleware('can:product.modify');

    /* Stock */
    Route::get('/gestion-de-inventario/stock', [StockController::class, 'index'])->name('stock.list')->middleware('can:stock.list');
    Route::post('/gestion-de-inventario/stock', [StockController::class, 'list'])->name('stock.data_table')->middleware('can:stock.list');
    Route::get('/gestion-de-inventario/stock/sucursal/{id}', [StockController::class, 'index'])->name('stock.get_one')->middleware('can:stock.modify');
    Route::get('/gestion-de-inventario/stock/crear', [StockController::class, 'create'])->name('stock.create')->middleware('can:stock.modify');
    Route::post('/gestion-de-inventario/stock/agregar', [StockController::class, 'store'])->name('stock.add')->middleware('can:stock.modify');

    /* Sales */
    Route::get('/area-de-ventas/venta', [SaleController::class, 'index'])->name('sale.list')->middleware('can:sale.list');
    Route::post('/area-de-ventas/venta', [SaleController::class, 'list'])->name('sale.data_table')->middleware('can:sale.list');
    Route::get('/area-de-ventas/venta/sucursal/{id}', [SaleController::class, 'index'])->name('sale.get_one')->middleware('can:sale.modify');
    Route::get('/area-de-ventas/venta/crear', [SaleController::class, 'create'])->name('sale.create')->middleware('can:sale.modify');
    Route::post('/area-de-ventas/venta/agregar', [SaleController::class, 'store'])->name('sale.add')->middleware('can:sale.modify');



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

    Route::get('/soporte/preguntas-frecuentes/administracion', [UserQuestionController::class, 'listado'])->name('user-questions.list')->middleware();
    Route::post('/soporte/preguntas-frecuentes/administracion/uno', [UserQuestionController::class, 'get_one'])->name('user-questions.get_one')->middleware();
    Route::delete('/soporte/preguntas-frecuentes/administracion/eliminar-pregunta/{id}', [UserQuestionController::class, 'destroy'])->name('user-questions.delete')->middleware();
    Route::patch('/soporte/preguntas-frecuentes/administracion/actualizar-pregunta/{id}', [UserQuestionController::class, 'update'])->name('user-questions.update')->middleware();


    Route::view('/soporte/manual-admin', 'admin.support.adminmanual')->name('support.adminmanual')->middleware('auth');

    /*Prueba */
    Route::get('/gestion-base/configuracion-base/dashboard/{id}', [DashboardController::class, 'index'])->name('sale.fetch');
    Route::get('/fetch-sales/{id}', [DashboardController::class, 'dataMonthSales'])->name('sale.fetch2');


    /*Perfil De Usuario */
    Route::get('/perfil', [UserController::class, 'profile'])->name('user.profile');
    Route::patch('/password', [UserController::class, 'editPassword'])->name('user.editPassword');
    Route::patch('/editProfile/{id}', [UserController::class, 'editProfile'])->name('user.editProfile');




});
