<?php

namespace App\Interfaces;

class CertificateData {
    public function __construct(
        public string $name,
        public string $descricaoDocumento,
        public string $numeroDocumento,
        public string $refEvent,
        public string $eventName,
        public string $validationCode,
    ) {}
}
