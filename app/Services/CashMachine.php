<?php

namespace App\Services;

use App\Contracts\TransactionContract;
use App\Models\Transaction;
use Illuminate\Validation\ValidationException;

class CashMachine
{
    /**
     * @throws ValidationException
     */
    public function store(TransactionContract $transaction)
    {

        $inputs = $transaction->validate()->validate();

        return Transaction::create([
            'amount' => $transaction->amount(),
            'inputs' => $inputs,
            'type' => $transaction->getContext()
        ]);

    }
}
