<?php

namespace App\Enums;

enum TransactionType: string
{
    case Cash = 'cash';
    case CreditCard = 'credit_card';
    case BankTransfer = 'bank_transfer';
}
