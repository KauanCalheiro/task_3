<?php

use App\Http\Controllers\API\SyncController;
use App\Http\Middleware\RequestLog;
use App\Http\Middleware\TrustKey;

Route::get('/status', function () {
    return response()->json(['message' => 'API of Sync is working']);
});

Route::prefix('/')->group(function () {
        Route::middleware(TrustKey::class)->group(function () {
            Route::get   ('sync',     [SyncController::class, 'index'  ]);
            Route::post  ('sync',     [SyncController::class, 'store'  ]);
        });
    
});
// Route::prefix('/')->group(function () {
//     Route::middleware(RequestLog::class)->group(function () {
//         Route::middleware(TrustKey::class)->group(function () {
//             Route::get   ('async',     [SyncController::class, 'index'  ]);
//             Route::post  ('async',     [SyncController::class, 'store'  ]);
//         });
//     });
// });