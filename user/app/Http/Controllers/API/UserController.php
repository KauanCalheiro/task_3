<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public static function index(Request $request){
        try {
            return response()->json( User::where("is_active", User::ACTIVE)->get(), Response::HTTP_OK );
        }
        catch (Exception $e) {
            return response()->json( $e, Response::HTTP_INTERNAL_SERVER_ERROR );
        }
    }

    public static function show(int|string $id){
        try {
            return response()->json( User::where("id", $id)->where("is_active", User::ACTIVE)->firstOrFail(), Response::HTTP_OK );
        }
        catch (Exception $e) {
            return response()->json( $e, Response::HTTP_INTERNAL_SERVER_ERROR );
        }
    }

    public static function login(int|string $id){
        try {
            $user = User::where("id", $id)->where("is_active", User::ACTIVE)->firstOrFail();
            return response()->json( [
                'id'       => $user->id,
                'password' => $user->password
            ], Response::HTTP_OK );
        }
        catch (Exception $e) {
            return response()->json( $e, Response::HTTP_INTERNAL_SERVER_ERROR );
        }
    }

    public function store(Request $request){
        try {
            $validatedData = $request->validate(User::RULES);
            $validatedData['password'] = md5($validatedData['password']);
            return response()->json( User::create($validatedData), Response::HTTP_CREATED );
        }
        catch (Exception $e) {
            return response()->json( $e, Response::HTTP_INTERNAL_SERVER_ERROR );
        }
    }

    public function update(Request $request, $id){
        // try {
        //     $validatedData = $request->validate(User::RULES);
        //     $validatedData['password'] = md5($validatedData['password']);
        //     return response()->json( User::update($validatedData), Response::HTTP_OK );
        // }
        // catch (Exception $e) {
        //     return response()->json( $e, Response::HTTP_INTERNAL_SERVER_ERROR );
        // }
    }

    public function destroy($id){
        // $user = User::find($id);
        // if (!$user) {
        //     return response()->json(['message' => 'User not found'], 404);
        // }

        // $user->delete();

        // return response()->json(['message' => 'User deleted successfully'], 200);
    }
}
