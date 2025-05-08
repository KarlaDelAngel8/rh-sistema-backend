<?php

use App\Http\Controllers\Users\UsersController;
use Illuminate\Support\Facades\Route;

Route::prefix('users')->group(function () {
    Route::post('/', [UsersController::class, 'index']);
    Route::post('/create', [UsersController::class, 'store']);
    Route::get('/active', [UsersController::class, 'activeRecords']);
    Route::get('/me', [UsersController::class, 'me']);
    Route::get('/{user}', [UsersController::class, 'show']);
    Route::put('/update/{user}', [UsersController::class, 'update']);
    Route::put('/delete/{user}/', [UsersController::class, 'changeStatus']);
    Route::post('{user}/change-password', [UsersController::class, 'changePassword']);
    Route::put('/language', [UsersController::class, 'changeLanguage']);
});
