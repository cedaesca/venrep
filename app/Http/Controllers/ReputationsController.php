<?php

namespace App\Http\Controllers;

use App\Enums\ReputationType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ReputationsController extends Controller
{
    public function create(User $user)
    {
        return view('reputations.create', [
            'user' => $user,
            'reputationTypes' => [
                'positive' => ReputationType::POSITIVE->value,
                'negative' => ReputationType::NEGATIVE->value
            ]
        ]);
    }

    public function store(Request $request, User $user)
    {
        $validReputationTypes = array_column(ReputationType::cases(), 'value');

        $validRecommendedTransactions = [
            'recommends_zelle',
            'recommends_cash',
            'recommends_ves',
            'recommends_binance',
            'recommends_paypal',
            'recommends_others',
        ];

        $validated = $request->validate([
            'rep_type' => ['required', 'string', Rule::in($validReputationTypes)],
            'recommended_transactions' => ['required', 'array'],
            'recommended_transactions.*' => [Rule::in($validRecommendedTransactions), 'string']
        ]);

        $mappedTransactions = [];

        foreach ($validated['recommended_transactions'] as $value) {
            $mappedTransactions[$value] = true;
        }

        Auth::user()->issuedReputation()->create(array_merge($mappedTransactions, [
            'given_to' => $user->id,
            'type' => $validated['rep_type']
        ]));

        return to_route('users.show', $user);
    }
}
