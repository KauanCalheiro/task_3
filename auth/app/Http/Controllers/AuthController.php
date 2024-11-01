<?php

namespace App\Http\Controllers;

use App\Services\ApiService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public static function login(Request $request)
    {
        try {
            $refUser  = $request->input('ref_user');
            $password = md5($request->input('password')) ;

            if (empty($refUser)) {
                throw new Exception('"ref_user" is required', Response::HTTP_BAD_REQUEST);
            }

            if (empty($password)) {
                throw new Exception('"password" is required', Response::HTTP_BAD_REQUEST);
            }

            $response = Http::withHeader('Authorization', $request->header('Authorization'))
            ->get("http://php-user:80/api/2/login");


            if($response->successful() == false) {
                throw new Exception("User not found", Response::HTTP_BAD_REQUEST);
            }

            $user = json_decode($response->getBody()->getContents());

            if($user->password != $password) {
                throw new Exception("Invalid password", Response::HTTP_BAD_REQUEST);
            }

            // TODO: generate a token and return it
            return ApiService::response([]);
        } 
        catch (Exception $e) {
            return ApiService::responseError($e);
        }
    }

    public static function logout(Request $request)
    {
        return response()->json(['message'=> 'logout']);
        // desautenticar usuario
    }

    public static function validate(Request $request)
    {
        return response()->json(['message'=> 'validate']);
        // validar token
    }
}
