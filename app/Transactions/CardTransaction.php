<?php

namespace App\Transactions;

use App\Enums\TransactionType;
use App\Support\BaseTransaction;
use App\Transactions\ValidationRules\CardTransactionValidationRule;
use Illuminate\Http\Request;

class CardTransaction extends BaseTransaction
{
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->setContext(TransactionType::CreditCard);
        $this->transactionValidationRule = new CardTransactionValidationRule($request);
    }
}
