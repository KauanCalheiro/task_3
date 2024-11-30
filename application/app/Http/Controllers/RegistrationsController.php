<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;


class RegistrationsController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $response_inscricoes = Http::withHeaders([
            'Authorization' => 'Bearer a2FrYXVfYm9tYmFkYW8='
        ])->get('http://localhost:80/api/inscription/inscriptions/'.$userId);

        $inscricoes = $response_inscricoes->json();

        $response_event = Http::withHeaders([
            'Authorization' => 'Bearer a2FrYXVfYm9tYmFkYW8='
        ])->get('http://localhost:80/api/event');

        $eventos = $response_event->json();

        $response_attendance = Http::withHeaders([
            'Authorization' => 'Bearer a2FrYXVfYm9tYmFkYW8='
        ])->get('http://localhost:80/api/attendance');

        $presencas = $response_attendance->json();

        $registrations = [];
        foreach ($eventos as $key => $event) {
            $fl_inscrito = false;
            foreach ($inscricoes as $inscricao) {
                if ($inscricao['ref_event'] == $event['id']) {
                    $registrations[$key]['id'] = $inscricao['id'];
                    $registrations[$key]['ref_event'] = $inscricao['ref_event'];
                    $registrations[$key]['name'] = $event['name'];
                    $registrations[$key]['description'] = $event['description'];
                    $registrations[$key]['location'] = $event['location'];
                    foreach($presencas as $presenca)
                    {
                        $registrations[$key]['fl_presenca'] = false;
                        if($inscricao['id'] == $presenca['ref_inscription'])
                        {
                            $registrations[$key]['fl_presenca'] = true;
                            break;
                        }
                    }
                    break;
                }
            }
        }

        $events = collect($registrations)->map(function ($event) {
            return (object) $event;
        });

        return view('registrations', compact('events'));
    }
}

