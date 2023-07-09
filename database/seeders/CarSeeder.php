<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Car;
use App\Services\VinApi;

class CarSeeder extends Seeder
{    
    public function run(): void
    {
        $faker = Faker::create();
        $vinCodes = config('vincodes');

        foreach($vinCodes as $vinCode){
            $car = [
                'name' => $faker->name,
                'number' => $faker->unique()->regexify('[A-Z]{2}[0-9]{2}[A-Z]{2}'),
                'vin_code' => $vinCode,
                'color' => $faker->colorName()
            ];

            $car = array_merge(VinApi::getCarDataByVin($vinCode), $car);
            Car::create($car);
        }
    }
}
