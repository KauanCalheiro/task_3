<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

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
        return view('users.edit', compact('user'));
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
