<?php

namespace App\Http\Requests\Reputation;

use App\Http\Requests\MainRequest;

use App\Models\Reputation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StoreReputationRequest extends MainRequest
{
    /**
     * Class constructor
     *
     * @param Request $request
     * @return void
     */
    public function __construct(Request $request)
    {
        $validRecommendedTransactions = array_map(
            fn($value) => "recommends_{$value}",
            Reputation::TRANSACTION_TYPES
        );

        $validationRules = [
            'rep_type' => ['required', 'string', Rule::in(array_values(Reputation::TYPES))],
            'recommended_transactions' => ['required', 'array'],
            'recommended_transactions.*' => [Rule::in($validRecommendedTransactions), 'string']
        ];

        parent::__construct($request, $validationRules);
    }

    /**
     * Returns true if the request is valid
     *
     * @return boolean
     */
    public function isValid() : bool
    {
        return parent::isValid();
    }
}
