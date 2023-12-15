<?php

namespace App\Http\Controllers\Transactions;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Contracts\View\View;

class TransactionListController extends Controller
{
    public function __invoke(): View
    {
        $transactions = Transaction::orderBy('created_at', 'desc')->get();
        return view('pages.transactions.table', ['transactions' => $transactions]);
    }
}
