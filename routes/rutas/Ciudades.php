<?php

    use Illuminate\Support\Facades\Route;

    use App\Http\Controllers\Sistema\CiudadController;

    Route::get('ciudades', [CiudadController::class,'index'])->name('ciudad.index');

    Route::get('ciudad/create/encontrarPais', [CiudadController::class,'encontrarPais']);
    Route::get('ciudad/create/encontrarProvincia', [CiudadController::class,'encontrarProvincia']);

    Route::post('/ciudad/guardar', [CiudadController::class,'guardar']);



?>