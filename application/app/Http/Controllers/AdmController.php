<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;


class AdmController extends Controller
{
    public function index()
    {
        $response_inscricoes = Http::withHeaders([
            'Authorization' => "Bearer {$_ENV['TRUST_KEY']}"
        ])->get("{$_ENV['URL_PROD']}/api/inscription");

        $inscricoes = $response_inscricoes->json();

        $response_presencas = Http::withHeaders([
            'Authorization' => "Bearer {$_ENV['TRUST_KEY']}"
        ])->get("{$_ENV['URL_PROD']}/api/attendance");

        $presencas = $response_presencas->json();

        $inscriptions = [];
        foreach ($inscricoes as $key => $inscricao) 
        {
            $inscriptions[$key]['id'] = $inscricao['id'];
            $inscriptions[$key]['ref_user'] = $inscricao['ref_user'];
            $inscriptions[$key]['ref_event'] = $inscricao['ref_event'];
            $inscriptions[$key]['dt_inscription'] = $inscricao['dt_inscription'];
            
            foreach ($presencas as $presenca) 
            {
                $inscriptions[$key]['fl_presenca'] = false;
                
                if ($inscricao['id'] == $presenca['ref_inscription']) 
                {
                    $inscriptions[$key]['fl_presenca'] = true;
                    break;
                }
            }
        }

        $inscriptions = collect($inscriptions)->map(function ($inscription) {
            return (object) $inscription;
        });

        return view('adm.adm', compact('inscriptions'));
    }
}
