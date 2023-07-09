<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $responseData = innerRequest($request, '/api/cars', 'GET');

        return view('home', [
            'cars' => $responseData->data ?? [],
            'pagination' => $responseData->meta->links ?? [],
            'currentPage' => $responseData->meta->current_page ?? 1,
            'lastPage' => $responseData->meta->last_page ?? 1,
            'carsCount' => $responseData->meta->total ?? 0
        ]);
    }

    public function edit(Request $request, $id){
        $responseData = innerRequest($request, '/api/cars/'.$id, 'GET');
        $finalData = [];

        foreach ($responseData->data as $key => $value){
           $finalData[$key] = $value;
        }
    
        return view('edit', $finalData);
    }
}