<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

Route::resource('productos', ProductoController::class, ['except' => ['show']]);
Route::get('productos-stock', [ProductoController::class, 'stock'])->name('producto.stock');
Route::get('productos-precios', [ProductoController::class, 'precios'])->name('producto.precios');


?>