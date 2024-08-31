<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property int $id
 * @property int $given_by
 * @property int $given_to
 * @property string $type
 * @property int $recommends_zelle
 * @property int $recommends_binance
 * @property int $recommends_ves
 * @property int $recommends_cash
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $issuer
 * @property-read \App\Models\User $receiver
 * @method static \Database\Factories\ReputationFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Reputation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reputation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reputation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Reputation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reputation whereGivenBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reputation whereGivenTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reputation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reputation whereRecommendsBinance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reputation whereRecommendsCash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reputation whereRecommendsVes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reputation whereRecommendsZelle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reputation whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reputation whereUpdatedAt($value)
 * @property int $recommends_paypal
 * @property int $recommends_others
 * @method static \Illuminate\Database\Eloquent\Builder|Reputation negatives()
 * @method static \Illuminate\Database\Eloquent\Builder|Reputation positives()
 * @method static \Illuminate\Database\Eloquent\Builder|Reputation whereRecommendsOthers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reputation whereRecommendsPaypal($value)
 * @mixin \Eloquent
 */
class Reputation extends Model
{
    use HasFactory;

    const TYPES = [
        'negative' => 'negative',
        'positive' => 'positive',
    ];

    const TRANSACTION_TYPES = [
        'zelle',
        'binance',
        'cash',
        'ves',
        'paypal',
        'others'
    ];

    protected $guarded = ['given_by'];

    public function issuer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'given_by');
    }

    public function receiver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'given_to');
    }

    public function scopePositives($query)
    {
        return $query->where('type', self::TYPES['positive']);
    }

    public function scopeNegatives($query)
    {
        return $query->where('type', self::TYPES['negative']);
    }

    /**
     * Format recommendations as a comma-separated string.
     *
     * @return string
     */
    public function getRecommendedTransactions(): array
    {
        $recommendations = [];

        foreach (self::TRANSACTION_TYPES as $type) {
            $recomendationProperty = "recommends_{$type}";

            if ($this->{$recomendationProperty}) {
                $recommendations[] = __("reputations.create.inputs.transaction_options.{$type}");
            }
        }

        return $recommendations;
    }
}
