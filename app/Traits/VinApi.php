<?php

namespace App\Traits;

trait VinApi
{
    public function getCarDataByVin($vinCode)
    {
        $apiUrl = "https://vpic.nhtsa.dot.gov/api/vehicles/decodevin/$vinCode?format=json";
        $jsonData = httpGetJson($apiUrl);
        $data = [];

        foreach($jsonData['Results'] as $result){
            if($result['Variable'] === 'Make'){
                $data['mark_api_id'] = $result['ValueId'];
            } else if ($result['Variable'] === 'Model'){
                $data['model_api_id'] = $result['ValueId'];
            } else if ($result['Variable'] === 'Model Year'){
                $data['year'] = $result['Value'];
            }
        }

        return $data;
    }
}