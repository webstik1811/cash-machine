<?php

namespace App\Transactions\ValidationRules;

use App\Rules\CheckTotalAmountLimit;
use App\Support\BaseTransactionValidationRule;

class BankTransactionValidationRule extends BaseTransactionValidationRule
{
    public function getValidationRules(): array
    {
        return [
            'transfer_date' => ['required', 'date', 'after_or_equal:today'],
            'customer_name' => ['required', 'string', 'max:255'],
            'account_number' => ['required', 'regex:/^[A-Za-z0-9]{6}$/'],
            'bank_amount' => ['required', 'regex:/^\d+(\.\d{1,2})?$/', new CheckTotalAmountLimit()],
        ];
    }
}
