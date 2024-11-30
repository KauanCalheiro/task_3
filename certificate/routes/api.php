<?php

use App\Http\Controllers\CertificateController;
use App\Http\Middleware\RequestLog;
use App\Http\Middleware\TrustKey;
use Illuminate\Support\Facades\Route;

Route::get('/status', function () {
    return response()->json(['message' => 'API of Certificates is working']);
});

Route::middleware(RequestLog::class)->group(function () {
    Route::middleware(TrustKey::class)->group(function () {
        Route::post('/',                           [CertificateController::class, 'store'   ]);
        Route::get('/{ref_inscription}',          [CertificateController::class, 'show'    ]);
        Route::get('/validate/{validation_code}', [CertificateController::class, 'validate']);
    });
});