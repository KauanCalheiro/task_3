<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Services\ApiService;
use App\Services\CertificateService;
use App\Services\InscriptionService;
use Exception;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    // // Sobre os certificados, esses possuem um código único de
    // // autenticação impresso no próprio documento, acompanhado de um endereço para validação digital desse
    // // certificado.

    // // CREATE TABLE IF NOT EXISTS "certificates" (
    // //     "id" SERIAL PRIMARY KEY,
    // //     "ref_inscription" INTEGER NOT NULL,
    // //     "server_path" TEXT NOT NULL,
    // //     "validation_code" TEXT NOT NULL,

    // //     "created_at" TIMESTAMP NOT NULL DEFAULT NOW(),
    // //     "updated_at" TIMESTAMP,
    // //     "deleted_at" TIMESTAMP
    // // );

    // // Rotas:
    // // - GET /certificates/{ref_inscription}
    // // - POST /certificates
    // // - GET /certificates/validate/{validation_code}

    // Route::post('/certificates',                           [CertificateController::class, store   ]);
    // Route::get('/certificates/{ref_inscription}',          [CertificateController::class, show    ]);
    // Route::get('/certificates/validate/{validation_code}', [CertificateController::class, validate]);

    /**
     * Display a listing of the resource.
     */
    public function show(Request $request, $ref_inscription)
    {
        try {
            $certificate = Certificate::where("ref_inscription", $ref_inscription)->firstOrFail();

            $fileBase64Encoded = base64_encode(file_get_contents(__DIR__ . "/../../../certificates/$certificate->server_path"));

            $certificate->file = $fileBase64Encoded;

            return ApiService::response($certificate);

        } catch (Exception $e) {
            return ApiService::responseError($e);
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate(Certificate::RULES);

            $inscription = InscriptionService::index($validated['ref_inscription']);
            $validationCode = CertificateService::generateValidationCode();

            $certificateData = CertificateService::createCertificateData($inscription, $validationCode);
            $certificatePath = CertificateService::saveCertificate($certificateData);

            $validated['server_path'] = $certificatePath;
            $validated['validation_code'] = $validationCode;

            $certificate = Certificate::create($validated);
            
            return ApiService::response($certificate);
        } catch (Exception $e) {
            return ApiService::responseError($e);
        }
    }

    public function validate(Request $request, $validation_code)
    {
        try {
            $certificate = Certificate::where("validation_code", $validation_code)->firstOrFail();

            return $this->show($request, $certificate->ref_inscription);
        } catch (Exception $e) {
            return ApiService::responseError($e);
        }
    }
}
