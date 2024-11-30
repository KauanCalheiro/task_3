<?php

namespace App\Interfaces;

class Event {
    public function __construct(
        public string $name,
        public string $description,
        public string $dt_init,
        public string $dt_end,
        public string $location,
        public string $capacity,
    ) {}
}