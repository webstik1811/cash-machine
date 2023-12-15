<?php

namespace App\Transactions\ValidationRules;

use App\Rules\CheckTotalAmountLimit;
use App\Support\BaseTransactionValidationRule;

class CashTransactionValidationRule extends BaseTransactionValidationRule
{
    public function getValidationRules(): array
    {
        return [
            'cash.1'   => ['required','numeric', 'min:0'],
            'cash.5'   => ['required','numeric', 'min:0'],
            'cash.10'  => ['required','numeric', 'min:0'],
            'cash.50'  => ['required','numeric', 'min:0'],
            'cash.100' => ['required','numeric', 'min:0'],
            'cash' => [
                'array',
                new CheckTotalAmountLimit($this->calculateTotalCashAndLimit($this->request->input('cash', [])))
            ],
        ];
    }

    public function calculateTotalCashAndLimit($cashValues = [])
    {
        return min(
            collect($cashValues)
            ->reduce(fn ($carry, $quantity, $denomination) =>
                $carry + ($denomination * $quantity), 0),
            config('services.cash_machine.max_cash_accept_limit')
        );
    }
}
