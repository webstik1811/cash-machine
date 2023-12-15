<?php

namespace App\Transactions;

use Akaunting\Money\Currency;
use Akaunting\Money\Money;
use App\Enums\TransactionType;
use App\Support\BaseTransaction;
use App\Transactions\ValidationRules\BankTransactionValidationRule;
use Illuminate\Http\Request;

class BankTransaction extends BaseTransaction
{
    public function __construct(Request $request) {
        $this->request = $request;
        $this->setContext(TransactionType::BankTransfer);
        $this->transactionValidationRule = new BankTransactionValidationRule($request);
    }

    public function amount(): Money
    {
        return new Money(
            $this->request->input('bank_amount'),
            new Currency(config('money.defaults.currency')),
            true
        );
    }
}
