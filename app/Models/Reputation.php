<?php

namespace App\Models;

use App\Enums\ReputationType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reputation extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'recommends_zelle',
        'recommends_binance',
        'recommends_ves',
        'recommends_cash'
    ];

    public function issuer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'given_by');
    }

    public function receiver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'given_to');
    }
}
