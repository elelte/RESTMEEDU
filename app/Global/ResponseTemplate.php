<?php

function ResponseTemplate($data, $kode, $message){

    return response()->json([

        'data'    => $data,
        
        'status'  => $kode,
        
        'message' => $message

    ], $kode);

}