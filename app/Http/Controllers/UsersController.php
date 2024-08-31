<?php

namespace App\Http\Controllers;

use App\Enums\ReputationType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, User $user)
    {
        $orderBy = $request->order ?? 'desc';

        $reputations = $user->receivedReputation();

        if ($request->filter === 'positives') {
            $reputations = $reputations->positives();
        }

        if ($request->filter === 'negatives') {
            $reputations = $reputations->negatives();
        }

        $reputations = $reputations->with('issuer')
            ->orderBy('created_at', $orderBy)
            ->paginate(10)
            ->appends($request->query());

        return view('users.show', [
            'user' => $user,
            'pointsTotal' => $user->getTotalReputationPoints(),
            'positiveReputation' => ReputationType::POSITIVE->value,
            'reputations' => $reputations
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
