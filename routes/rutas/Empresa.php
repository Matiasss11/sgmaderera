<?php

    use Illuminate\Support\Facades\Route;

    use App\Http\Controllers\Empresa\EmpresaController;

    Route::resource('empresas', EmpresaController::class);







?>