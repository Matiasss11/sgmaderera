<?php

use Illuminate\Support\Facades\Route;

    Route::get('configuracion', [App\Http\Controllers\Sistema\ConfiguracionController::class, 'index'])->name('configuracion.index');

?>
