<?php

namespace App\Interfaces;

class Inscription {
    public function __construct(
        public int $ref_user,
        public int $ref_event,
        public User $user,
        public Event $event,
    ) {}
}