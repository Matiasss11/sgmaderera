<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\RoleController;

    Route::resource('roles', RoleController::class);



?>