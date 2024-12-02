<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf;


class CertificationController
{
    public function index()
    {
        $data = new \stdClass;
        $data->nome = "Validar certificado!";

       // var_dump($data);die;
        return view('certificate', compact('data'));
    }
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

    public function validateCert(Request $request)
    {
        $data = $request->all();
        $response_certificate = Http::withHeaders([
            'Authorization' => "Bearer {$_ENV['TRUST_KEY']}"
        ])->get("{$_ENV['URL_PROD']}/api/certificate/validate" . $data['codverificacao'], []);

        if($response_certificate->successful())
        {
            $certificado = $response_certificate->json();
            $base64File = $certificado['payload']['file'];

            $htmlContent = base64_decode($base64File);

            $pdf = Pdf::loadHTML($htmlContent);

            $fileName = "certificado_{$certificado['id']}.pdf";

            return $pdf->download($fileName);
        }
        else
        {
           // var_dump("teste");die;
            $data = new \stdClass;
            $data->nome = "Certificado não válido!";

           // var_dump($data);die;
            return view('certificate', compact('data'));
        }
    }
}
