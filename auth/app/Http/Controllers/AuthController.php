<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use App\Services\ApiService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    const LOGIN_RULES = [
        "ref_user" => [
            "required",
            "unique:App\Models\Auth,ref_user,NULL,id,deleted_at,NULL"
        ],
        "password" => [
            "required"
        ],
    ];

    const LOGOUT_RULES = [
        "ref_user" => [
            "required",
            "exists:App\Models\Auth,ref_user,deleted_at,NULL"
        ],
    ];

    public static function login(Request $request)
    {
        try {
            $data = $request->validateWithBag('login', self::LOGIN_RULES);

            $refUser  = $data['ref_user'];
            $password = md5($data['password']) ;

            $response = Http::withHeader('Authorization', $request->header('Authorization'))
            ->get("http://php-user:80/api/$refUser/login");

            if($response->successful() == false) {
                throw new Exception("Usuário não encontrado", Response::HTTP_NOT_FOUND);
            }

            $user = (json_decode($response->getBody()->getContents()))->payload;

            if($user->password != $password) {
                throw new Exception("Senha inválida", Response::HTTP_UNAUTHORIZED);
            }

            $auth = new Auth(['ref_user' => $refUser]);
            $auth->saveOrFail();

            return ApiService::response([], 'Login realizado com sucesso');
        }
        catch (Exception $e) {
            return ApiService::responseError($e);
        }
    }

    public static function logout(Request $request)
    {
        try {
            $data = $request->validateWithBag('logout', self::LOGOUT_RULES);

            $refUser = $data['ref_user'];

            Auth::where('ref_user', $refUser)->firstOrFail()->deleteOrFail();

            return ApiService::response([],'Logout realizado com sucesso');
        }
        catch (Exception $e) {
            return ApiService::responseError($e);
        }
    }
}
