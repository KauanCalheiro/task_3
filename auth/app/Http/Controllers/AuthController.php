<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public static function login(Request $request)
    {
        $ref_user = $request->input('ref_user');

        // buscar usuario da api de usuarios

        // ver se a senha bate

        // retornar token + data de expiração + id do usuário
    }
}
