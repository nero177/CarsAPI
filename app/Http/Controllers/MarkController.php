<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MarkService;

class MarkController extends Controller
{
    public function show(Request $request, $name){
        $markService = new MarkService();
        $data = $markService->show($request, $name);
        return response()->json($data);
    }
}
