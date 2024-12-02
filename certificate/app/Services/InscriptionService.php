<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;
use App\Interfaces\Inscription;

class InscriptionService {
    public static function index($ref_inscription) {
        $response = Http::withHeader('Authorization', "Bearer {$_ENV['TRUST_KEY']}")
        ->get("http://node-inscription:3000/api/{$ref_inscription}");

        if (!$response->successful()) {
            throw new Exception('Failed to get inscription');
        }

        if(empty($response->json())) {
            throw new Exception("Inscription not found for id: {$ref_inscription}");
        }

        return new Inscription(
            $response->json()['ref_user'],
            $response->json()['ref_event'],
            UserService::index($response->json()['ref_user']),
            EventService::index($response->json()['ref_event'])
        );
    }
}