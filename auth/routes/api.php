<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\RequestLog;
use App\Http\Middleware\TrustKey;

Route::get('/status', function () {
    return response()->json(['message' => 'API of Auths is working']);
});

Route::middleware(RequestLog::class)->group(function () {
    Route::middleware(TrustKey::class)->group(function () {
        Route::post('/login',  [AuthController::class, 'login' ]);
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});