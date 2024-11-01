<?php

use App\Http\Controllers\API\UserController;

Route::get('/status', function () {
    return response()->json(['message' => 'API of Users is working']);
});

Route::prefix('/')->group(function () {
    Route::get   ('',     [UserController::class, 'index' ]);
    Route::get   ('{id}', [UserController::class, 'show'  ]);
    Route::post  ('',     [UserController::class, 'store' ]);
    Route::put   ('{id}', [UserController::class, 'update']);
    Route::delete('',     [UserController::class, 'delete']);
});
