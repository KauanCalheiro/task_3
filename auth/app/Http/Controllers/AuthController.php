<?php

namespace App\Http\Controllers;

use App\Services\ApiService;
use App\Services\AuthService;
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
            ->get("http://php-user:80/api/$refUser/login");

            if($response->successful() == false) {
                throw new Exception("User not found", Response::HTTP_BAD_REQUEST);
            }

            $user = (json_decode($response->getBody()->getContents()))->payload;

            if($user->password != $password) {
                throw new Exception("Invalid password", Response::HTTP_BAD_REQUEST);
            }

            return ApiService::response(AuthService::createAuth($user->id));
        }
        catch (Exception $e) {
            return ApiService::responseError($e);
        }
    }

    public static function logout(Request $request)
    {
        try {
            $token = $request->bearerToken();

            if (empty($token)) {
                throw new Exception('"token" is required', Response::HTTP_BAD_REQUEST);
            }

            AuthService::deleteAuth($token);

            return ApiService::response(['message' => 'Logout successful']);
        }
        catch (Exception $e) {
            return ApiService::responseError($e);
        }
    }

    public static function validate(Request $request)
    {
        try {
            $token = $request->input('token');

            $isValidToken = AuthService::isValidToken($token);

            return ApiService::response([
                'valid' => $isValidToken,
                'ref_user' => $isValidToken
                    ? AuthService::getUserByToken($token)
                    : null,
            ]);
        }
        catch (Exception $e) {
            return ApiService::responseError($e);
        }
    }
}
