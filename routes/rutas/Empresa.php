<?php

    use Illuminate\Support\Facades\Route;

    use App\Http\Controllers\Empresa\EmpresaController;

    Route::resource('empresas', EmpresaController::class);

    Route::post('empresa/create/paisCreate', [EmpresaController::class,'paisCreate']);
    Route::post('empresa/create/provinciaCreate', [EmpresaController::class,'provinciaCreate']);
    Route::post('empresa/create/ciudadCreate', [EmpresaController::class,'ciudadCreate']);



?>