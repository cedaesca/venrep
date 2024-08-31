<?php

namespace App\Models;

use App\Enums\ReputationType;
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
 * @mixin \Eloquent
 */
class Reputation extends Model
{
    use HasFactory;

    protected $guarded = ['given_by'];

    public $transactionRecomendationOptions = [
        'zelle',
        'binance',
        'cash',
        'ves',
        'paypal',
        'others'
    ];

    public function issuer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'given_by');
    }

    public function receiver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'given_to');
    }

    /**
     * Format recommendations as a comma-separated string.
     *
     * @return string
     */
    public function getRecommendedTransactions(): array
    {
        $recommendations = [];

        foreach ($this->transactionRecomendationOptions as $recommendation) {
            $recomendationProperty = "recommends_{$recommendation}";

            if ($this->{$recomendationProperty}) {
                $recommendations[] = __("reputations.create.inputs.transaction_options.{$recommendation}");
            }
        }

        return $recommendations;
    }
}
