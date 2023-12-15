<?php

namespace App\Http\Controllers\Transactions;

use App\Http\Controllers\Controller;
use App\Transactions\CardTransaction;
use Illuminate\Http\Request;

class CardTransactionController extends Controller
{
    public function __invoke(Request $request)
    {
        $transaction = $this->transactionFactory->make(CardTransaction::class, $request);

        $this->cashMachine->store($transaction);

        return redirect()->route('view.transaction.list');
    }
}
