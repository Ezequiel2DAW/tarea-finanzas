<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/incomes', function (Request $request) {
    
    
    return ['clave' => 'valor1'];
    //return $request->user();
});//->middleware('auth:sanctum');
