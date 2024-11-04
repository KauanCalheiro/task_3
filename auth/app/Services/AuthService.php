<?php

namespace App\Services;

use App\Models\Auth;
use Exception;
use Symfony\Component\HttpFoundation\Response;

class AuthService {
    public static function createAuth($refUser) {
        $lastValidAuth = self::getLastValidAuth($refUser);
        $hasValidAuth  = boolval($lastValidAuth);

        if($hasValidAuth) {
            return $lastValidAuth;
        }

        $auth = self::getLastAuth($refUser);

        if(!$auth) {
            $auth = new Auth();
            $auth->ref_user = $refUser;
        }

        $auth->token = md5(uniqid(mt_rand(), true));
        $auth->dt_expires = date("Y-m-d H:i:s", time() + Auth::TOKEN_LIFETIME);
        $auth->saveOrFail();

        return $auth;
    }

    public static function deleteAuth($token) {
        $auth = self::createAuth(self::getUserByToken($token));

        if (!$auth->delete()) {
            throw new Exception("Error deleting auth", Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return true;
    }


    private static function getLastValidAuth($refUser) {
        return Auth::where("ref_user", $refUser)
            ->where("dt_expires", ">", date("Y-m-d H:i:s"))
            ->orderBy("version", "desc")
            ->first();
    }

    private static function getLastAuth($refUser) {
        return Auth::where("ref_user", $refUser)
            ->orderBy("version", "desc")
            ->first();
    }

    public static function getUserByToken($token) {
        $auth = Auth::where("token", $token)
            ->where("dt_expires", ">", date("Y-m-d H:i:s"))
            ->first();

        if(!$auth) {
            throw new Exception("Invalid token", Response::HTTP_UNAUTHORIZED);
        }

        return $auth->ref_user;
    }

    public static function isValidToken($token) {
        return Auth::where("token", $token)
            ->where("dt_expires", ">", date("Y-m-d H:i:s"))
            ->exists();
    }
}