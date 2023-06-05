<?php

namespace App\Traits;


trait HttpResponses {
    //succes
    protected function succes($data, $message = null, $code =200){
        return response()->json([
            'status' => 'La peticion salio bien ',
            'message' => $message,
            'data' => $data
        ], $code);
        
    }
    //error
    protected function error($data, $message = null , $code){
        return response()->json([
            'status' => 'Hay un error ...',
            'message' => $message,
            'data' => $data
        ], $code);
        
    }
}