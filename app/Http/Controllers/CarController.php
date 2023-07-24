<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CarService;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CollectionExport;
use App\Http\Requests\StoreCarRequest;

class CarController extends Controller
{

    public function index(Request $request)
    {
        $carService = new CarService();

        $results = $carService->index($request);

        if ($request->query('dataType') == 'excel') {
            $fileName = 'data.xlsx';

            $export = new CollectionExport($results);
            return Excel::download($export, $fileName);
        }

        return $results;
    }

    public function store(StoreCarRequest $request)
    {
        $validated = $request->validated();
        $carService = new CarService();
        $carService->store($validated);

        return response(200);
    }

    public function destroy($id)
    {
        $carService = new CarService();
        $carService->destroy($id);

        return response(200);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validated();
        $carService = new CarService();
        $carService->update($validated, $id);

        return redirect()->back()->with('status', 'Car saved successfully');
    }

    public function show($id)
    {
        $carService = new CarService();
        $data = $carService->show($id);

        return $data;
    }
}