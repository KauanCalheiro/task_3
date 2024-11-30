<?php

namespace App\Services;

use App\Interfaces\Event;
use Exception;
use Illuminate\Support\Facades\Http;

class EventService {
    public static function index($refEvent) {
        $response = Http::withHeader('Authorization', "Bearer {$_ENV['TRUST_KEY']}")
        ->get("http://node-event:3000/api/{$refEvent}");

        if (!$response->successful()) {
            throw new Exception('Failed to get event');
        }

        if(empty($response->json())) {
            throw new Exception("Event not found for id: {$refEvent}");
        }

        return new Event(
            $response->json()['name'],
            $response->json()['description'],
            $response->json()['dt_init'],
            $response->json()['dt_end'],
            $response->json()['location'],
            $response->json()['capacity'],
        );
    }
}