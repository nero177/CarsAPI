<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

if (! function_exists('innerRequest')) {
    function innerRequest(Request $request, $route, $method) {
        $innerRequest = Request::create($route, $method, $request->all());
        $response = Route::dispatch($innerRequest);
        $responseData = json_decode($response->getContent());
        return $responseData;
    }

    function httpGetJson($apiUrl){
        return Http::get($apiUrl)->json();
    }
}