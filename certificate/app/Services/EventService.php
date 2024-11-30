<?php

namespace App\Services;

use App\Interfaces\Event;

class EventService {
    public static function index($refEvent) {
        return new Event(
            'Evento 1',
            'Descrição do evento 1',
            '2021-01-01 00:00:00',
            '2021-01-01 00:00:00',
            'Local do evento 1',
            '100',
        );
    }
}