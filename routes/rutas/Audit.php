<?php

use Illuminate\Support\Facades\Route;

    Route::get('audits', [App\Http\Controllers\AuditController::class, 'index'])->name('audits.index');







?>
