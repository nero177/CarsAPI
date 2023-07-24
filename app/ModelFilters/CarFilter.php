<?php

namespace App\ModelFilters;
use EloquentFilter\ModelFilter;

class CarFilter extends ModelFilter{
    protected $operators = [
        'eq' => '=',
        'gt' => '>',
        'gte' => '>=',
        'lt' => '<',
        'lte' => '<=',
    ];

    protected $blacklist = ['proceedParams'];

    public function name($name){
        return $this->where('name', 'LIKE', "$name%");
    }

    public function number($number){
        return $this->where('number', 'LIKE', "$number%");
    }

    public function vin_code($vin_code){
        return $this->where('vin_code', 'LIKE', "$vin_code%");
    }

    public function year($year){
        $params = $this->proceedParams($year);
        $query_arr = [];

        foreach ($params as $param){
            $query_arr[] = ['year', $param['operator'],$param['value']];
        }

        return $this->where($query_arr);
    }

    public function sort($key){
        return $this->orderBy($key);
    }

    public function proceedParams($arr){
        $params = [];

        foreach($arr as $p_name => $p_value){
            if(!isset($this->operators[$p_name]))
                continue;

            $params[] = ['operator' => $this->operators[$p_name], 'value' => $p_value];  
        }

        return $params;
    }
}