<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\User;



class PerfilController extends Controller
{
    public function index()
    {

        $response_users = Http::withHeaders([
            'Authorization' => "Bearer {$_ENV['TRUST_KEY']}"
        ])->get("{$_ENV['URL_PROD']}/api/user/".Auth::id());

        $user = json_decode(json_encode($response_users['payload']));

        return view('perfil', compact('user'));
        
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate(User::RULES(false));

        $response_users = Http::withHeaders([
            'Authorization' => "Bearer {$_ENV['TRUST_KEY']}"
            ])->put("{$_ENV['URL_PROD']}/api/user/".$id, array_filter([
                'name' => isset($validatedData['name']) && $validatedData['name'] !== '' ? $validatedData['name'] : null,
                'email' => isset($validatedData['email']) && $validatedData['email'] !== '' ? $validatedData['email'] : null,
                'dt_birth' => isset($validatedData['dt_birth']) && $validatedData['dt_birth'] !== '' ? $validatedData['dt_birth'] : null,
                'cpf' => isset($validatedData['cpf']) && $validatedData['cpf'] !== '' ? $validatedData['cpf'] : null,
                'rg' => isset($validatedData['rg']) && $validatedData['rg'] !== '' ? $validatedData['rg'] : null
            ], function ($value) {
                return !is_null($value) && $value !== '';
            }));
        

            if ($response_users->successful()) {
                return redirect()->route('home')->with('success', 'Dados atualizados!');
            } else {
                return back()->withErrors(['error' => 'Falha ao criar o Evento.']);
            }
    }
}
