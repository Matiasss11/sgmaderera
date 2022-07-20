<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\PresupuestoController;

Route::resource('presupuestos', PresupuestoController::class);
Route::resource('ventas', VentaController::class);
?>