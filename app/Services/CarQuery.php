<?php

namespace App\Services;

use Illuminate\Http\Request;

class CarQuery{
    protected $allowedParams = [ //allowed params and their operators
        'name' => ['eq'],
        'number' => ['eq'],
        'color' => ['eq'],
        'vin_code' => ['eq'],
        'mark' => ['eq'],
        'model' => ['eq'],
        'year' => ['eq', 'gt', 'gte', 'lt', 'lte'],
    ];
    protected $allowedOperators = [ //allowed operators and their values
        'eq' => '=',
        'gt' => '>',
        'gte' => '>=',
        'lt' => '<',
        'lte' => '<=',
    ];

    protected $allowedOrder = ['desc', 'asc'];

    public function filter(Request $request){ //http://127.0.0.1:8000/api/cars?number[order]=desc&number[param]=test
        $eloQuery = [];

        foreach($this->allowedParams as $param => $operators){
            $query = $request->query($param);

            if(!isset($query)){
                continue;
            }
            
            foreach($operators as $operator){  
                if(isset($query[$operator])){
                    $eloQuery[] = [$param, $this->allowedOperators[$operator], $query[$operator]];
                }
            }
        }

        return $eloQuery;
    }

    public function sort(Request $request){
        $sort_query = [];

        foreach($this->allowedParams as $param => $operators){
            $query = $request->query($param);

            if(!isset($query['sort'])){
                continue;
            }

            $order = $query['sort'];

            if(!in_array($order, $this->allowedOrder)){
                continue;
            }
          
            $sort_query = ['key' => $param, 'value' => $order];
        }

        return $sort_query;
    }


}