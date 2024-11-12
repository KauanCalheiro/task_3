<?php

use App\Http\Controllers\LogController;
use App\Http\Middleware\TrustKey;

Route::get('/status', function () {
    return response()->json(['message' => 'API of Logs is working']);
});

Route::prefix('/')->group(function () {
    Route::middleware(TrustKey::class)->group(function () {
        Route::post  ('',     [LogController::class, 'store'  ]);
    });
});