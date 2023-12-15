<?php

namespace App\Support;

use Akaunting\Money\Currency;
use Akaunting\Money\Money;
use App\Contracts\TransactionContract;
use App\Contracts\TransactionValidationRuleContract;
use App\Enums\TransactionType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator as ValidatorResult;

abstract class BaseTransaction implements TransactionContract
{
    protected TransactionValidationRuleContract $transactionValidationRule;
    protected Request $request;

    protected TransactionType $context;

    public function validate(): ValidatorResult
    {
        return Validator::make(
            $this->request->all(),
            $this->transactionValidationRule->getValidationRules()
        );
    }

    public function inputs(): array
    {
        return $this->request->all();
    }

    public function amount(): Money
    {
        return new Money(
            $this->request->input('amount'),
            new Currency(config('money.defaults.currency')),
            true
        );
    }

    public function getContext(): TransactionType
    {
        return $this->context;
    }

    protected function setContext(TransactionType $context): void
    {
        $this->context = $context;
    }
}
