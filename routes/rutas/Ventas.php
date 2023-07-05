<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\PresupuestoController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\Ventas\EntregasController;

Route::resource('presupuestos', PresupuestoController::class);
Route::resource('reservas', ReservaController::class);
Route::resource('ventas', VentaController::class);
Route::resource('entregas', EntregasController::class);
?>
