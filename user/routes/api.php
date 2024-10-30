<?php

use App\Http\Controllers\API\UserController;

Route::apiResource('users', UserController::class);

Route::get('/', function () {
    return response()->json(['message' => 'API of Users is working']);
});
