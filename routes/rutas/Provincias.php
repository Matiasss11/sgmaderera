<?php

    use Illuminate\Support\Facades\Route;

    use App\Http\Controllers\Sistema\ProvinciaController;

    Route::get('provincia', [ProvinciaController::class,'index'])->name('provincia.index');

    Route::get('provincia/create/encontrarPais', [ProvinciaController::class,'encontrarPais']);

    Route::post('/provincia/guardar', [ProvinciaController::class,'guardar']);

?>