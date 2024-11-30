<?php

namespace App\Services;

use App\Interfaces\User;

class UserService {
    public static function index($refUser) {
        return new User(
            'João da Silva',
            'joao@gmail.com',
            '12345678901',
            '123456789',
        );
    }
}