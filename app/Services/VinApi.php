<?php

namespace App\Services;

class VinApi
{
    static public function getCarDataByVin($vinCode)
    {
        $apiUrl = "https://vpic.nhtsa.dot.gov/api/vehicles/decodevin/$vinCode?format=json";
        $jsonData = httpGetJson($apiUrl);
        $data = [];

        foreach($jsonData['Results'] as $result){
            if($result['Variable'] === 'Make'){
                $data['mark'] = $result['Value'];
            } else if ($result['Variable'] === 'Model'){
                $data['model'] = $result['Value'];
            } else if ($result['Variable'] === 'Model Year'){
                $data['year'] = $result['Value'];
            }
        }

        return $data;
    }
}