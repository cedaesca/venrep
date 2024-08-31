<?php

namespace App\Http\Controllers;

use App\Models\Reputation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ReputationsController extends Controller
{
    public function create(User $user)
    {
        if ($user->hasBeenGivenRepBy(Auth::user())) {
            return $this->handleAlreadyVoted($user);
        }

        return view('reputations.create', [
            'user' => $user,
            'reputationTypes' => Reputation::TYPES
        ]);
    }

    public function store(Request $request, User $user)
    {
        if ($user->hasBeenGivenRepBy(Auth::user())) {
            return $this->handleAlreadyVoted($user);
        }

        $validRecommendedTransactions = [
            'recommends_zelle',
            'recommends_cash',
            'recommends_ves',
            'recommends_binance',
            'recommends_paypal',
            'recommends_others',
        ];

        $validated = $request->validate([
            'rep_type' => ['required', 'string', Rule::in(array_values(Reputation::TYPES))],
            'recommended_transactions' => ['required', 'array'],
            'recommended_transactions.*' => [Rule::in($validRecommendedTransactions), 'string']
        ]);

        $mappedTransactions = [];

        foreach ($validated['recommended_transactions'] as $value) {
            $mappedTransactions[$value] = true;
        }

        Auth::user()->giveReputationTo($user, array_merge($mappedTransactions, ['type' => $validated['rep_type']]));

        return to_route('users.show', $user);
    }

    private function handleAlreadyVoted(User $user)
    {
        return to_route('users.show', $user)
            ->withErrors([
                'already_voted' => __('reputations.already_voted')
            ]);
    }
}
