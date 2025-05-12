<?php
use illuminate\Support\Facades\Route;

require __DIR__.'/api/auth.php';


Route::middleware('auth:api')->group(function () {
  require __DIR__.'/api/users.php';
    require __DIR__.'/api/test.php';
});

