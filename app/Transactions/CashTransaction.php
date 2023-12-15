<?php

namespace App\Transactions;

use Akaunting\Money\Currency;
use Akaunting\Money\Money;
use App\Enums\TransactionType;
use App\Support\BaseTransaction;
use App\Transactions\ValidationRules\CashTransactionValidationRule;
use Illuminate\Http\Request;

class CashTransaction extends BaseTransaction
{
    public function __construct(Request $request) {
        $this->request = $request;
        $this->setContext(TransactionType::Cash);
        $this->transactionValidationRule = new CashTransactionValidationRule($request);
    }


    public function amount(): Money
    {
        return new Money(
            $this->transactionValidationRule->calculateTotalCashAndLimit($this->request->input('cash', [])),
            new Currency(config('money.defaults.currency')),
            true
        );
    }
}
