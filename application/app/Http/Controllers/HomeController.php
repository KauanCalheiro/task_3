<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\CertificationMail;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userId = Auth::id();

        $response_inscricoes = Http::withHeaders([
            'Authorization' => "Bearer {$_ENV['TRUST_KEY']}"
        ])->get("{$_ENV['URL_PROD']}/api/inscription/inscriptions/".$userId);

        $inscricoes = $response_inscricoes->json();

        $response_event = Http::withHeaders([
            'Authorization' => "Bearer {$_ENV['TRUST_KEY']}"
        ])->get("{$_ENV['URL_PROD']}/api/event");

        $eventos = $response_event->json();
        foreach ($eventos as $key => $event) {
                foreach ($inscricoes as $inscricao) {
                    if (isset($inscricao['ref_event']) && $inscricao['ref_event'] == $event['id']) {
                        $inscricao = $inscricao['id'];
                        $fl_inscrito = true;
                        break;
                    }
                    else
                    {
                        $inscricao = 0;
                        $fl_inscrito = false;
                    }
                }
            
            
            $eventos[$key]['ref_inscription'] = $inscricao ? $inscricao : null;
            $eventos[$key]['fl_inscrito'] = $fl_inscrito;
        }

        $events = collect($eventos)->map(function ($event) {
            return (object) $event;
        });

        return view('home', compact('events'));
    }
}
