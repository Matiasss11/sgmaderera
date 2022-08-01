<?php

    use Illuminate\Support\Facades\Route;

    use App\Http\Controllers\Sistema\TipoMovimientoController;

    Route::get('tipomovimiento', [TipoMovimientoController::class,'index'])->name('tipomovimiento.index');

    Route::patch('tipomovimiento/{tipomovimiento}', [TipoMovimientoController::class,'update'])->name('tipomovimiento.update');



?>