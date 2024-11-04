<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\TrustKey;
use App\Http\Middleware\ValidateToken;

Route::get('/status', function () {
    return response()->json(['message' => 'API of Auths is working']);
});

Route::middleware(TrustKey::class)->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/validate', [AuthController::class, 'validate']);
});

Route::middleware(ValidateToken::class)->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});
