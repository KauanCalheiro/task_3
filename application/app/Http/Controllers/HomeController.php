<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;



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
            'Authorization' => 'Bearer a2FrYXVfYm9tYmFkYW8='
        ])->get('http://localhost:80/api/inscription/inscriptions/'.$userId);

        $inscricoes = $response_inscricoes->json();

        $response_event = Http::withHeaders([
            'Authorization' => 'Bearer a2FrYXVfYm9tYmFkYW8='
        ])->get('http://localhost:80/api/event');

        $eventos = $response_event->json();

        foreach ($eventos as $key => $event) {
            $fl_inscrito = false;
            foreach ($inscricoes as $inscricao) {
                if ($inscricao['ref_event'] == $event['id']) {
                    $fl_inscrito = true;
                    break;
                }
            }
            $eventos[$key]['fl_inscrito'] = $fl_inscrito;
        }

        $events = collect($eventos)->map(function ($event) {
            return (object) $event;
        });

        return view('home', compact('events'));
    }
}
