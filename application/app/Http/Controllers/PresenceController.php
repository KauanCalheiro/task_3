<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class PresenceController extends Controller
{
    public function store(Request $request, $id)
    {
        try
        {
            $data = $request->all();

            $response_inscription = Http::withHeaders([
                'Authorization' => "Bearer {$_ENV['TRUST_KEY']}"
            ])->post("{$_ENV['URL_PROD']}/api/attendance", [
                'ref_inscription' => $id
            ]);

            if ($response_inscription->successful()) {


                $response_inscription = Http::withHeaders([
                    'Authorization' => "Bearer {$_ENV['TRUST_KEY']}"
                ])->get("{$_ENV['URL_PROD']}/api/inscription/".$id, [
                ]);

                $inscricao = $response_inscription->json();

                var_dump($inscricao);die;
                $response_event = Http::withHeaders([
                    'Authorization' => "Bearer {$_ENV['TRUST_KEY']}"
                ])->get("{$_ENV['URL_PROD']}/api/event/");

                $eventos = $response_event->json();

                $evento

                Mail::to('joao.vieceli@universo.univates.br')->send(new CertificationMail([
                    'name' => Auth::user()->name,
                    'eventName' => $evento['name'],
                    'eventDate' => $evento['dt_init'] . '  -  ' . $eventos['dt_end'],
                    'eventLocation' => $evento['location'],
                    'type' => 2
                ]));

                return redirect()->route('adm.index')->with('success', 'Presença registrada!');
            } else {
                return back()->withErrors(['error' => 'Falha ao realizar inscrição.']);
            }
        }
        catch (Exception $e) {
            return $e;
        }
    }
}
