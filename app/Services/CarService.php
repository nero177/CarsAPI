<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Services\CarQuery;
use App\Http\Resources\CarCollection;
use App\Models\Car;
use App\Http\Resources\CarResource;
use App\Services\VinApi;


class CarService
{
    public function index(Request $request)
    {
        $carQuery = new CarQuery();
        $key = $request->query('search');

        if (isset($key) && !empty($key)) {
            return new CarCollection(Car::where('name', 'LIKE', '%' . $key . '%')
                ->orWhere('number', 'LIKE', '%' . $key . '%')
                ->orWhere('vin_code', 'LIKE', '%' . $key . '%')
                ->paginate());
        }

        $queryItems = $carQuery->filter($request);
        $sortQuery = $carQuery->sort($request);

        if ($request->query('dataType') == 'excel') {
            return new CarCollection(Car::orderBy($sortQuery['key'] ?? 'name', $sortQuery['value'] ?? 'asc')->where($queryItems)->get());
        }

        if (count($queryItems) == 0) {
            return new CarCollection(Car::orderBy($sortQuery['key'] ?? 'name', $sortQuery['value'] ?? 'asc')->paginate());
        } else {
            return new CarCollection(Car::orderBy($sortQuery['key'] ?? 'name', $sortQuery['value'] ?? 'asc')->where($queryItems)->paginate());
        }
    }

    public function store($data){
        $car = new Car();
        $data = array_merge($data, VinApi::getCarDataByVin($data['vin_code']));

        foreach ($data as $name => $value) {
            $car->$name = $value;
        }

        $car->save();
    }

    public function destroy($id){
        return Car::destroy($id);
    }

    public function update($data, $id){
        $car = Car::findOrFail($id);

        foreach ($data as $key => $value) {
            $car->$key = $value;
        }

        $car->save();
    }

    public function show($id){
        return new CarResource(Car::findOrFail($id));
    }
}