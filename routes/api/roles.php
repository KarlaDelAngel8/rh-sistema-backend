<?php

use App\Http\Controllers\Roles\RoleController;
use Illuminate\Support\Facades\Route;

Route::prefix('roles')->group(function () {
    Route::post('/', [RoleController::class, 'index']);
    Route::post('/create', [RoleController::class, 'store']);
    // Route::get('/{role}', [RoleController::class, 'show']);
    Route::put('/update/{role}', [RoleController::class, 'update']);
    Route::put('/delete/{role}', [RoleController::class, 'changeStatus']);
    Route::get('/active',[RoleController::class, 'activeRecords']);
});
