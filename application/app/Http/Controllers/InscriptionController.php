<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inscription;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;


class InscriptionController extends Controller
{
    public function store(Request $request , $id)
    {
        try 
        {
            $user = Auth::user();

            $response_inscription = Http::withHeaders([
                'Authorization' => 'Bearer a2FrYXVfYm9tYmFkYW8='
            ])->post('http://localhost:80/api/inscription', [
                'ref_user' => $user->id,
                'ref_event' => $id, 
                'dt_inscription' => Carbon::now() ,
            ]);
            
            if ($response_inscription->successful()) {
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
