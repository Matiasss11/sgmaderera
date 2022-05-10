<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function() {
    
    include 'rutas/Audit.php';
    include 'rutas/Configuracion.php';
    include 'rutas/Estadistica.php';
    include 'rutas/Roles.php';
    include 'rutas/User.php';
    
});

Route::resource('productos', ProductoController::class, ['except' => ['show']]);
Route::get('productos-stock', [ProductoController::class, 'stock'])->name('producto.stock');
Route::get('productos-precios', [ProductoController::class, 'precios'])->name('producto.precios');
