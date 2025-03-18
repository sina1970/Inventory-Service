<?php

namespace App\Helpers;

class ApiResponse
{
    public static function success(string $message, $data=null){
        return response()->json([
            "message" => $message,
            "data" => $data
        ], 200);
    }
}
