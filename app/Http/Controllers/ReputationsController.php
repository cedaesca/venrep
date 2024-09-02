<?php

namespace App\Http\Controllers;

use App\Http\Requests\Reputation\StoreReputationRequest;
use App\Models\Reputation;
use App\Models\User;
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

    public function store(StoreReputationRequest $request, User $user)
    {
        if (!$request->isValid()) {
            // show error messages
        }

        if ($user->hasBeenGivenRepBy(Auth::user())) {
            return $this->handleAlreadyVoted($user);
        }

        $mappedTransactions = [];

        foreach ($request->get('recommended_transactions') as $value) {
            $mappedTransactions[$value] = true;
        }

        Auth::user()->giveReputationTo($user, array_merge($mappedTransactions, ['type' => $request->get('rep_type')]));

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
