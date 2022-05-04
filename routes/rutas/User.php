<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;

    Route::resource('roles', UserController::class);



?>