<?php

namespace App\Http\Controllers\Transactions;

use App\Http\Controllers\Controller;
use App\Transactions\BankTransaction;
use Illuminate\Http\Request;

class BankTransactionController extends Controller
{
    public function __invoke(Request $request)
    {
        $transaction = $this->transactionFactory->make(BankTransaction::class, $request);

        $this->cashMachine->store($transaction);

        return redirect()->route('view.transaction.list');
    }
}
