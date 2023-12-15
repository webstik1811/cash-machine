<?php

namespace App\Http\Controllers\Transactions;

use App\Http\Controllers\Controller;
use App\Transactions\CashTransaction;
use Illuminate\Http\Request;

class CashTransactionController extends Controller
{
    public function __invoke(Request $request)
    {
        $transaction = $this->transactionFactory->make(CashTransaction::class, $request);

        $this->cashMachine->store($transaction);

        return redirect()->route('view.transaction.list');
    }
}
