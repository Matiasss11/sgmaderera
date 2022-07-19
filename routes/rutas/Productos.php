<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::resource('productos', ProductoController::class, ['except' => ['show']]);
Route::get('productos-stock', [ProductoController::class, 'stock'])->name('producto.stock');
Route::get('productos-precios', [ProductoController::class, 'precios'])->name('producto.precios');


?>