<?php

    use Illuminate\Support\Facades\Route;

    use App\Http\Controllers\Empresa\SucursalController;

    Route::resource('sucursales', SucursalController::class);

    Route::post('sucursal/create/paisCreate', [SucursalController::class,'paisCreate']);
    Route::post('sucursal/create/provinciaCreate', [SucursalController::class,'provinciaCreate']);
    Route::post('sucursal/create/ciudadCreate', [SucursalController::class,'ciudadCreate']);



?>