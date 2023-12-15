<?php

namespace App\Contracts;

use Akaunting\Money\Money;
use App\Enums\TransactionType;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Validator as ValidatorResult;

/**
 * The TransactionContract interface defines the contract for a transaction.
 */
interface TransactionContract
{
    public function validate(): ValidatorResult;

    /**
     * Retrieves the amount of money.
     *
     * @return Money The amount of money represented as an instance of the Money class.
     */
    public function amount(): Money;

    /**
     * Retrieves the array of inputs.
     *
     * @return array The array of inputs.
     */
    public function inputs(): array;

    /**
     * Retrieves the type of the transaction
     * @return TransactionType
     */
    public function getContext(): TransactionType;
}
