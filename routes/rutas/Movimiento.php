<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Sistema\MovimientoController;

Route::get('movimientos', [MovimientoController::class,'index'])->name('movimientos.index');


?>