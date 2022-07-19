<?php

    use Illuminate\Support\Facades\Route;

    use App\Http\Controllers\Sistema\PaisController;

    Route::get('paises', [PaisController::class,'index'])->name('pais.index');

    Route::post('/pais/guardar', [PaisController::class,'guardar']);

?>