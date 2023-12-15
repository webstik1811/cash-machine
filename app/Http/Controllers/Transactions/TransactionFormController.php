<?php

namespace App\Http\Controllers\Transactions;

use App\Http\Controllers\Controller;

class TransactionFormController extends Controller
{
    public function __invoke()
    {
        return view('pages.transactions.index');
    }
}
