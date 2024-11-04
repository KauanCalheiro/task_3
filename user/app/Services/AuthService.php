<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;

class AuthService {
    const API_URL = 'http://php-auth:80/api';
    const VALIDATE_ENDPOINT = 'validate';

    public static function isValidToken($token) {

        $response = Http::withHeader('Authorization', "Bearer {$_ENV['TRUST_KEY']}")
            ->withBody(json_encode(['token' => $token]))
            ->post(self::API_URL . '/' . self::VALIDATE_ENDPOINT)
        ;

        $content = json_decode($response->getBody()->getContents());

        if( !$response->successful() ) {
            throw new Exception(
                $content->error ?? $response->getReasonPhrase() ?? 'Error',
                $response->status()
            );
        }

        $GLOBALS['ref_user'] = $content->payload->ref_user;

        return $content->payload->valid;
    }

    public function getUserByToken($token) {

    }
}