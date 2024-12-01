<?php


use App\Http\Controllers\API\SyncController;
use App\Http\Middleware\RequestLog;
use App\Http\Middleware\TrustKey;
use App\Http\Middleware\HandleCors;


Route::middleware([HandleCors::class])->group(function () {

    Route::get('/status', function () {
        return response()->json(['message' => 'API of Sync is working']);
    });

    Route::prefix('/')->group(function () {
        Route::middleware(TrustKey::class)->group(function () {
            Route::get   ('',     [SyncController::class, 'index'  ]);
            Route::post  ('',     [SyncController::class, 'store'  ]);
        });
    });
});



// use App\Http\Controllers\API\SyncController;
// use App\Http\Middleware\RequestLog;
// use App\Http\Middleware\TrustKey;

// Route::get('/status', function () {
//     return response()->json(['message' => 'API of Sync is working']);
// });


// Route::prefix('/')->group(function () {
//         Route::middleware(TrustKey::class)->group(function () {
//             Route::get   ('',     [SyncController::class, 'index'  ]);
//             Route::post  ('',     [SyncController::class, 'store'  ]);
//         });
    
// });
// Route::prefix('/')->group(function () {
//     Route::middleware(RequestLog::class)->group(function () {
//         Route::middleware(TrustKey::class)->group(function () {
//             Route::get   ('async',     [SyncController::class, 'index'  ]);
//             Route::post  ('async',     [SyncController::class, 'store'  ]);
//         });
//     });
// });