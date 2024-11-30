<?php

namespace App\Services;

use App\Interfaces\User;
use Exception;
use Illuminate\Support\Facades\Http;

class UserService {
    public static function index($refUser) {
        $response = Http::withHeader('Authorization', "Bearer {$_ENV['TRUST_KEY']}")
        ->get("http://php-user:80/api/{$refUser}");

        if (!$response->successful()) {
            throw new Exception('Failed to get user');
        }

        if(empty($response->json())) {
            throw new Exception("User not found for id: {$refUser}");
        }

        return new User(
            $response->json()['payload']['name'],
            $response->json()['payload']['email'],
            $response->json()['payload']['cpf'],
            $response->json()['payload']['rg'],
        );
    }
}