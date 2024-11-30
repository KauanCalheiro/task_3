<?php

namespace App\Services;

use App\Interfaces\CertificateData;
use App\Interfaces\Inscription;
use Exception;

class CertificateService {
    public static function generateCertificate(CertificateData $certificateData) {
        $template = file_get_contents(__DIR__.'/../../resources/templates/certificate.html');

        $replacements = [
            '{{ name }}'               => $certificateData->name,
            '{{ descricaoDocumento }}' => $certificateData->descricaoDocumento,
            '{{ numeroDocumento }}'    => $certificateData->numeroDocumento,
            '{{ refEvent }}'           => $certificateData->refEvent,
            '{{ eventName }}'          => $certificateData->eventName,
            '{{ validationCode }}'     => $certificateData->validationCode,
        ];

        $template = str_replace(
            array_keys($replacements),
            array_values($replacements),
            $template
        );

        return $template;
    }

    public static function createCertificateData(Inscription $inscription, $validationCode) {
        return new CertificateData(
            $inscription->user->name,
            empty($inscription->user->cpf) ? 'RG' : 'CPF',
            empty($inscription->user->cpf) ? $inscription->user->rg : $inscription->user->cpf,
            $inscription->ref_event,
            $inscription->event->name,
            $validationCode,
        );
    }

    public static function generateValidationCode() {
        return md5(uniqid(rand(), true));
    }

    public static function saveCertificate(CertificateData $certificateData) {
        $certificatePath = __DIR__.'/../../certificates';

        if (!is_dir($certificatePath)) {
            mkdir($certificatePath, 0777, true);
        }

        $fileName = "{$certificateData->refEvent}_{$certificateData->numeroDocumento}_{$certificateData->validationCode}.html";

        $fileSize = file_put_contents(
            "{$certificatePath}/{$fileName}",
            self::generateCertificate($certificateData)
        );

        if ($fileSize === false) {
            throw new Exception('Error saving certificate');
        }

        return $fileName;
    }
}