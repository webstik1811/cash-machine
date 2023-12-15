<?php

namespace App\Transactions\ValidationRules;

use App\Rules\CheckTotalAmountLimit;
use App\Support\BaseTransactionValidationRule;
use Carbon\Carbon;

class CardTransactionValidationRule extends BaseTransactionValidationRule
{
    public function getValidationRules(): array
    {
        return [
            'card_number'    => ['required', 'regex:/^4\d{15}$/'],
            'expiration_date' => ['required', 'date_format:m/Y', 'after:' . Carbon::now()->addMonths(2)->format('m/Y')],
            'cardholder'     => ['required', 'string', 'max:255'],
            'cvv'            => ['required', 'digits:3'],
            'amount'         => ['required', 'regex:/^\d+(\.\d{1,2})?$/', new CheckTotalAmountLimit()],
        ];
    }
}
