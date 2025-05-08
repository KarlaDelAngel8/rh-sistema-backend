<?php

use App\Http\Controllers\Status\StatusController;
use Illuminate\Support\Facades\Route;

Route::get('/statuses',[StatusController::class, 'index']);