<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
     // Listar todos os usuários
     public function index()
     {
         return response()->json(User::all(), 200);
     }
 
     // Criar um novo usuário
     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'nome' => 'required|string|max:255',
             'email' => 'required|string|email|max:255|unique:users',
             'senha' => 'required|string|min:8',
         ]);
 
         $validatedData['senha'] = bcrypt($validatedData['senha']);
         $user = User::create($validatedData);
 
         return response()->json($user, 201);
     }
 
     // Mostrar um usuário específico
     public function show($id)
     {
         $user = User::find($id);
         if (!$user) {
             return response()->json(['message' => 'User not found'], 404);
         }
         return response()->json($user, 200);
     }
 
     // Atualizar um usuário
     public function update(Request $request, $id)
     {
         $user = User::find($id);
         if (!$user) {
             return response()->json(['message' => 'User not found'], 404);
         }
 
         $validatedData = $request->validate([
             'nome' => 'sometimes|string|max:255',
             'email' => 'sometimes|string|email|max:255|unique:users,email,' . $user->id,
             'senha' => 'sometimes|string|min:8',
         ]);
 
         if (isset($validatedData['senha'])) {
             $validatedData['senha'] = bcrypt($validatedData['senha']);
         }
 
         $user->update($validatedData);
 
         return response()->json($user, 200);
     }
 
     public function destroy($id)
     {
         $user = User::find($id);
         if (!$user) {
             return response()->json(['message' => 'User not found'], 404);
         }
 
         $user->delete();
 
         return response()->json(['message' => 'User deleted successfully'], 200);
     }
}
