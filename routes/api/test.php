<?php
use \App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
Route::prefix('tets')->group(function () {

    Route::post('/', [TestController::class, 'success']);
    Route::post('/create', [TestController::class, 'create']);
    Route::put('/update/{role}', [TestController::class, 'badRequest']);
    Route::put('/delete/{role}', [TestController::class, 'exception']);
});
