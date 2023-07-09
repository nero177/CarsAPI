<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CarService;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CollectionExport;

class CarController extends Controller
{

    public function index(Request $request)
    {
        $carService = new CarService();

        $results = $carService->index($request);
        $dataType = $request->query('dataType');

        if ($dataType == 'excel') {
            $fileName = 'test.xlsx';

            $export = new CollectionExport($results);
            return Excel::download($export, $fileName);
        }

        return $results;
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|unique:cars|max:255',
            'number' => 'required|unique:cars',
            'vin_code' => 'required|unique:cars',
        ]);

        if($request->fails()){
            return redirect()->back()->withErrors($request->errors())->withInput();
        }

        $carService = new CarService();
        $carService->store($data);
        
        return redirect()->back()->with('status', 'Car created successfully');
    }

    public function destroy($id)
    {
        $carService = new CarService();
        $carService->destroy($id);
        return redirect()->back()->with('status', 'Car successfully deleted');
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'name' => 'required|max:40',
            'number' => 'required|regex:/^[A-Z]{2}[0-9]{2}[A-Z]{2}$/',
            'vin_code' => 'required|max:40',
            'color' => 'max:40',
            'mark' => 'max:40',
            'model' => 'max:40',
            'year' => 'integer|regex:/^\d{4}$/',
        ]);

        $carService = new CarService();
        $carService->update($data, $id);

        return redirect()->back()->with('status', 'Car saved successfully');
    }

    public function show($id)
    {
        $carService = new CarService();
        $data = $carService->show($id);

        return $data;
    }
}