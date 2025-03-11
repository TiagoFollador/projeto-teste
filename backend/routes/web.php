<?php

use App\Http\Controllers\LogsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;



Route::prefix('api/v1')->group(function () {
    Route::apiResource('users', UsersController::class);
    Route::apiResource('logs', LogsController::class);
});

