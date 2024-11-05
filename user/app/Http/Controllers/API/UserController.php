<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\ApiService;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public static function index(Request $request){
        try {
            return ApiService::response( User::get() );
        }
        catch (Exception $e) {
            return ApiService::responseError( $e );
        }
    }

    public static function show(int|string $id){
        try {
            return ApiService::response( User::where("id", $id)->firstOrFail() );
        }
        catch (Exception $e) {
            return ApiService::responseError( $e );
        }
    }

    public static function login(int|string $id){
        try {
            $user = User::where("id", $id)->firstOrFail();

            return ApiService::response([
                "id"       => $user->id,
                "password" => $user->password
            ]);
        }
        catch (Exception $e) {
            return ApiService::responseError( $e );
        }
    }

    public function store(Request $request){
        try {
            $validatedData = $request->validate(User::RULES());
            $validatedData['password'] = md5($validatedData['password']);

            return ApiService::response( User::create( $validatedData ), code: Response::HTTP_CREATED );
        }
        catch (Exception $e) {
            return ApiService::responseError( $e );
        }
    }

    public function update(Request $request, $id){
        try {
            $data = $request->validate(User::RULES(false));

            if($request->filled('password')) {
                $data['password'] = md5($data['password']);
            }

            $user = User::findOrFail($id);
            $user->updateOrFail($data);

            return ApiService::response($user);
        }
        catch (Exception $e) {
            return ApiService::responseError( $e );
        }
    }

    public function destroy($id){
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return ApiService::response( $user );
        }
        catch (Exception $e) {
            return ApiService::responseError( $e );
        }
    }
}
