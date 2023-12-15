<?php

namespace App\Support;

use App\Contracts\TransactionValidationRuleContract;
use Illuminate\Http\Request;

abstract class BaseTransactionValidationRule implements TransactionValidationRuleContract
{
    public function __construct(protected Request $request){

    }
}
