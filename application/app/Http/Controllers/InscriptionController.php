<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inscription;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\CertificationMail;




class InscriptionController extends Controller
{
    public function store(Request $request , $id)
    {
        try 
        {
            $user = Auth::user();

            $response_inscription = Http::withHeaders([
                'Authorization' => "Bearer {$_ENV['TRUST_KEY']}"
            ])->post("{$_ENV['URL_PROD']}/api/inscription", [
                'ref_user' => $user->id,
                'ref_event' => $id, 
                'dt_inscription' => Carbon::now() ,
            ]);

            if ($response_inscription->successful()) {

                $response_event = Http::withHeaders([
                    'Authorization' => "Bearer {$_ENV['TRUST_KEY']}"
                ])->get("{$_ENV['URL_PROD']}/api/event/".$id);
        
                $evento = $response_event->json();
        
                $return_email = Mail::to('joao.vieceli@universo.univates.br')->send(new CertificationMail([
                    'name' => Auth::user()->name,
                    'eventName' => $evento['name'],
                    'eventDate' => $evento['dt_init'] . '  -  ' . $evento['dt_end'],
                    'eventLocation' => $evento['location'],
                    'type' => 1
                ]));

                return redirect()->route('index')->with('success', 'Inscrição confirmada!');
            } else {
                return back()->withErrors(['error' => 'Falha ao realizar inscrição.']);
            }
        }
        catch (Exception $e) {
            return $e;
        }
    }

    public function destroy($ref_event, $ref_inscription)
    {
        try 
        {
            $response_inscription = Http::withHeaders([
                'Authorization' => "Bearer {$_ENV['TRUST_KEY']}"
            ])->delete("{$_ENV['URL_PROD']}/api/inscription/".$ref_inscription);

            if ($response_inscription->successful()) {

                $response_event = Http::withHeaders([
                    'Authorization' => "Bearer {$_ENV['TRUST_KEY']}"
                ])->get("{$_ENV['URL_PROD']}/api/event/".$ref_event);
        
                $evento = $response_event->json();
        
                Mail::to('joao.vieceli@universo.univates.br')->send(new CertificationMail([
                    'name' => Auth::user()->name,
                    'eventName' => $evento['name'],
                    'eventDate' => $evento['dt_init'] . '  -  ' . $evento['dt_end'],
                    'eventLocation' => $evento['location'],
                    'type' => 2
                ]));

                return redirect()->route('index')->with('success', 'Inscrição confirmada!');
            } else {
                return back()->withErrors(['error' => 'Falha ao realizar inscrição.']);
            }
        }
        catch (Exception $e) {
            return $e;
        }
    }
    
}
