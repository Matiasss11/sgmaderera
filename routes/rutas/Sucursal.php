<?php

    use Illuminate\Support\Facades\Route;

    use App\Http\Controllers\Empresa\SucursalController;

    Route::resource('sucursales', SucursalController::class);
    
    Route::get('sucursal/create/encontrarProvincia', [SucursalController::class,'encontrarProvincia']);
    Route::get('sucursal/create/encontrarCiudad', [SucursalController::class,'encontrarCiudad']);



?>