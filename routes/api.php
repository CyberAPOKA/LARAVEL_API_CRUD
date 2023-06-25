<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ManagerController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('users', [UserController::class, 'users']);
    Route::post('create', [UserController::class, 'create']);
    Route::post('user/{id}', [UserController::class, 'update']);
    Route::delete('user/{id}', [UserController::class, 'delete']);
});

Route::namespace('manager')->prefix('manager')->group(function () {
    Route::post('/login', [ManagerController::class, 'login']);
});
