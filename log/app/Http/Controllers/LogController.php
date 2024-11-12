<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Services\ApiService;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogController extends Controller {
    public static function index(Request $request){
        try {
            return ApiService::response( Log::get() );
        }
        catch (Exception $e) {
            return ApiService::responseError( $e );
        }
    }

    public function store(Request $request){
        try {
            $validatedData = $request->validateWithBag('store_log', Log::RULES);

            return ApiService::response( Log::create( $validatedData ), code: Response::HTTP_CREATED );
        }
        catch (Exception $e) {
            return ApiService::responseError( $e );
        }
    }
}
