<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Http\Resources\CarResource;
use App\Traits\VinApi;
use App\ModelFilters\CarFilter;


class CarService
{
    use VinApi;

    public function index(Request $request)
    {  
        if ($request->query('dataType') == 'excel') {
            return CarResource::collection(Car::filter($request->all(), CarFilter::class)->get());
        }

        return CarResource::collection(Car::filter($request->all(), CarFilter::class)->paginate());
    }

    public function store($data){
        $car = new Car();
        $data = array_merge($data, $this->getCarDataByVin($data['vin_code']));

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