<?php

use App\Http\Controllers\API\UserController;
use App\Http\Middleware\TrustKey;

Route::get('/status', function () {
    return response()->json(['message' => 'API of Users is working']);
});

Route::prefix('/')->group(function () {
    Route::middleware(TrustKey::class)->group(function () {
        Route::get   ('',     [UserController::class, 'index'  ]);
        Route::get   ('{id}', [UserController::class, 'show'   ]);
        Route::post  ('',     [UserController::class, 'store'  ]);
        Route::put   ('{id}', [UserController::class, 'update' ]);
        Route::delete('{id}', [UserController::class, 'destroy']);

        Route::get   ('{id}/login', [UserController::class, 'login'  ]);
    });
});