<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class PresenceController extends Controller
{
    public function store(Request $request, $id)
    {
        try 
        {
            $data = $request->all();
            
            $response_inscription = Http::withHeaders([
                'Authorization' => 'Bearer a2FrYXVfYm9tYmFkYW8='
            ])->post('http://localhost:80/api/attendance', [
                'ref_inscription' => $id
            ]);
            
            if ($response_inscription->successful()) {
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
