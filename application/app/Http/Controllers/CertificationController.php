<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf;


class CertificationController extends Controller
{
    public function store($id)
    {
        $response_certificate = Http::withHeaders([
            'Authorization' => "Bearer {$_ENV['TRUST_KEY']}"
        ])->post("{$_ENV['URL_PROD']}/api/certificate", [
            'ref_inscription' => $id
        ]);

        if($response_certificate->successful())
        {
            $certificado = Http::withHeaders([
                'Authorization' => "Bearer {$_ENV['TRUST_KEY']}"
            ])->get("{$_ENV['URL_PROD']}/api/certificate/". $id);
    
            $certificado = $certificado->json();
    
            $base64File = $certificado['payload']['file'];

            $htmlContent = base64_decode($base64File);

            $pdf = Pdf::loadHTML($htmlContent);

            $fileName = "certificado_{$id}.pdf";
            
            return $pdf->download($fileName);
        }

        //return redirect()->route('minhas-inscricoes.index')->with('success', 'Inscrição confirmada!');
    }
}
