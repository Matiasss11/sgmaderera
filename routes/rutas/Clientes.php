<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Clientes\ClienteController;

    Route::resource('clientes', ClienteController::class);

?>