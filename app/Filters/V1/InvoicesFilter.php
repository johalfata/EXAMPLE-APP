<?php

namespace App\Filters\V1;
use App\Filters\ApiFilter;

class InvoicesFilter extends ApiFilter {
    
    protected $safeParms = [
        'customer_id' => ['eq'],
        'amount' => ['eq', 'lt', 'lte', 'gt', 'gte',],
        'status' => ['eq', 'ne'],
        'billed_date' => ['eq', 'lt', 'lte', 'gt', 'gte',],
        'paid_date' => ['eq', 'lt', 'lte', 'gt', 'gte',],
    ];

    protected $columnMap = [
        'customerId' => 'customer_id',
        'billedDate' => 'billed_date',
        'paidDate' => 'paid_date'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '≤',
        'gt' => '>',
        'gte' => '≥',
        'ne' => '≠'
    ];
}
