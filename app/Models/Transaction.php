<?php

namespace App\Models;

use Akaunting\Money\Currency;
use Akaunting\Money\Money;
use App\Enums\TransactionType;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transactions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['amount', 'inputs', 'type', 'user_id'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'inputs' => 'array',
        'type' => TransactionType::class,
    ];

    protected function amount(): Attribute
    {
        return Attribute::make(
            get: fn (int $value) => new Money($value, new Currency(config('money.defaults.currency'))),
            set: fn (Money $value) => $value->getAmount()
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
