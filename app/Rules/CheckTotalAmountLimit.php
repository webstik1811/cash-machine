<?php

namespace App\Rules;

use Akaunting\Money\Currency;
use Akaunting\Money\Money;
use App\Models\Transaction;
use Illuminate\Contracts\Validation\Rule;


class CheckTotalAmountLimit implements Rule
{
    protected Money $maxAmount;
    protected Currency $currency;

    public function __construct(private int|null $money = null)
    {
        $this->currency = new Currency(config('money.defaults.currency'));
        $this->maxAmount = new Money(config('services.cash_machine.max_amount_limit'), $this->currency, true);
    }

    public function passes($attribute, $value): bool
    {
        if($this->money) {
            $value = $this->money;
        }

        if (!($value instanceof Money)) {
            $value = new Money($value, $this->currency, true);
        }

        $totalAmountInDB = Transaction::sum('amount'); // Това предполага, че сумата е съхранена като цяло число
        $totalAmountInDB = new Money($totalAmountInDB, $value->getCurrency());

        return $totalAmountInDB->add($value)->lessThanOrEqual($this->maxAmount);
    }


    public function message(): string
    {
        return "The total amount of transactions exceeds the limit of {$this->maxAmount->format()}.";
    }
}
