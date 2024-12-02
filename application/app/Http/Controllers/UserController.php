<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function index()
    {
        // $users = User::all();

        // foreach ($users as $user) {
        //     // Verifique se a senha já foi criptografada corretamente
        //     if (Hash::needsRehash($user->password)) {
        //         // Se não estiver no formato Bcrypt, recriptografe a senha
        //         $user->password = Hash::make($user->password);
        //         $user->save();
        //     }
        // }

        $users = Http::withHeaders([
            'Authorization' => "Bearer {$_ENV['TRUST_KEY']}"
        ])->get("{$_ENV['URL_PROD']}/api/user");

        $users = collect($users['payload'])->map(function ($user) {
            return (object) $user;
        });

        return view('adm.users.index', compact('users'));
    }

    public function create()
    {
        return view('adm.users.create');
    }

    public function store(Request $request){
        try {
            $validatedData = $request->validate(User::RULES());
            $validatedData['password'] = md5($validatedData['password']);

            $user = User::create( $validatedData );

            if ($user) {
                return redirect()->route('users.index')->with('success', 'Usuário criado com sucesso!');
            } else {
                return back()->withErrors(['error' => 'Falha ao criar o usuário.']);
            }
        }
        catch (Exception $e) {
            return $e;
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('adm.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate(User::RULES());

        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($request->password);
        }

        $user->update($validatedData);

        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuário excluído com sucesso!');
    }
    

}
