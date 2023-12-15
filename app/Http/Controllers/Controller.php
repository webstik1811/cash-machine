<?php

namespace App\Http\Controllers;

use App\Services\CashMachine;
use App\Support\TransactionFactory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use ValidatesRequests;

    protected TransactionFactory $transactionFactory;

    protected CashMachine $cashMachine;

    public function __construct(TransactionFactory $transactionFactory, CashMachine $cashMachine)
    {
        $this->transactionFactory = $transactionFactory;
        $this->cashMachine = $cashMachine;
    }
}
