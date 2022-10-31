<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Productos\CategoriaController;

    Route::resource('categorias', CategoriaController::class);

?>