<?php

use App\Http\Controllers\Auth\PermissionController;
use Illuminate\Support\Facades\Route;


Route::post('/check-permission', [PermissionController::class, 'checkRoutePermission']);
Route::post('/user-permissions', [PermissionController::class, 'getUserPermissions']);
