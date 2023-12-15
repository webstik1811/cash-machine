<?php

namespace App\Contracts;

interface TransactionValidationRuleContract
{
    public function getValidationRules(): array;
}
