<?php

namespace App\Services;

use App\Interfaces\Inscription;

class InscriptionService {
    public static function index($ref_inscription) {
        $refUser = 1;
        $refEvent = 1;

        return new Inscription(
            $refUser,
            $refEvent,
            UserService::index($refUser),
            EventService::index($refEvent)
        );
    }
}