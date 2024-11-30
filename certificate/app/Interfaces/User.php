<?php

namespace App\Interfaces;

class User {
    public function __construct(
        public string $name,
        public string $email,
        public string|null $cpf,
        public string|null $rg,
    ) {}
}