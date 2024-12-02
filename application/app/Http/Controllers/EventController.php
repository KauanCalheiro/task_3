<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Http;


class EventController extends Controller
{
    public function index()
    {
       // $events = Event::all();
        
        $response_event = Http::withHeaders([
            'Authorization' => "Bearer {$_ENV['TRUST_KEY']}"
        ])->get("{$_ENV['URL_PROD']}/api/event");

        $eventos = $response_event->json();

        $events = collect($eventos)->map(function ($event) {
            return (object) $event;
        });

        return view('adm.events.index', compact('events'));
    }
    
    public function create()
    {
        return view('adm.events.create');
    }

    public function store(Request $request)
    {
        try {

            $data = $request->all();

            $response_events = Http::withHeaders([
                'Authorization' => "Bearer {$_ENV['TRUST_KEY']}"
            ])->post("{$_ENV['URL_PROD']}/api/event/", [
                'name' => $data['name'], 
                'description' => $data['description'],
                'dt_init' => $data['dt_init'],
                'dt_end' => $data['dt_end'],
                'location' => $data['location'],
                'capacity' => $data['capacity']
            ]);

            if ($response_events->successful()) {
                return redirect()->route('events.index')->with('success', 'Evento criado com sucesso!');
            } else {
                return back()->withErrors(['error' => 'Falha ao criar o Evento.']);
            }
        }
        catch (Exception $e) {
            return $e;
        }
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('adm.events.edit', compact('event'));
    }
}
