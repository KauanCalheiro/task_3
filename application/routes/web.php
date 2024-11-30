<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\RegistrationsController;
use App\Http\Controllers\AdmController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\MailController;

Route::middleware(['auth'])->group(function () {
    Route::resource('/', HomeController::class);
    Route::resource('/minhas-inscricoes', RegistrationsController::class);

    Route::post('/presences/{inscription}', [PresenceController::class, 'store'])->name('presences.store');
    Route::post('/inscription/{event}', [InscriptionController::class, 'store'])->name('inscription.store');
    Route::post('/inscription/delete/{eventId}/{refInscription}', [InscriptionController::class, 'destroy'])->name('inscription.delete');

    Route::resource('adm/events', EventController::class);
    Route::resource('adm/users', UserController::class);
    Route::resource('/adm', AdmController::class);
});

Auth::routes();