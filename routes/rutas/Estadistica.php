<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Sistema\EstadisticaController;

    Route::resource('estadisticas', EstadisticaController::class);

?>