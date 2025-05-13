<?php

use \App\Http\Controllers\BranchController;
use Illuminate\Support\Facades\Route;

Route::prefix('branches')->group(function () {
    Route::get('/active', [BranchController::class, 'activeBranches']);
    Route::get('/', [BranchController::class, 'index']);
    Route::post('/', [BranchController::class, 'store']);
    Route::put('/{id}', [BranchController::class, 'update']);
});
