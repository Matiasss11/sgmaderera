<?php

use Illuminate\Support\Facades\Route;

    Route::get('audits', [App\Http\Controllers\Sistema\AuditController::class, 'index'])->name('audits.index');







?>
