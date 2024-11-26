<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('home');
    });

    Route::get('/adm', function () {
        return view('adm/adm');
    });

    Route::resource('adm/users', UserController::class);

    // Outras rotas que exigem autenticação...
});






// Route::get('/adm/users', function () {
//     return view('adm/users/index');
// });

// Route::prefix('adm')->name('adm.')->group(function () {
//     // Isso irá criar todas as rotas RESTful (index, create, store, etc.)
//     Route::resource('users', UserController::class);
// });




Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
