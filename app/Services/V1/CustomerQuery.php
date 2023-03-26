<?php

namespace App\Services\V1;
use Illuminate\Http\Request;

class CustomerQuery {
    protected $safeParms = [
        'id' => ['eq'],
        'name' => ['eq'],
        'type' => ['eq'],
        'email' => ['eq'],
        'address' => ['eq'],
        'city' => ['eq'],
        'postal_code' => ['eq', 'gt', 'lt']
    ];

    protected $columnMap = [
        'postal_code' => 'postal_code'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '≤',
        'gt' => '>',
        'gte' => '≥'
    ];


    public function transform(Request $request) {
        $eloQuery = [];
        
        foreach ($this->$safeParms as $parm => $operators) {
            $query = $request->query($parm);
            if (!isset($query)) {
                continue;
            }
            
            $column = $this->$columnMap[$parm] ?? $parm;

            foreach ($operators as $operator) {
                if (isset($query[$operator])) {
                    $eloQuery[] = [$column, $this->$operatorMap($operator), $query[$operator]];
                }
            }
        }

        return $eloQuery;
    } 

}