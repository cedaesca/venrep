@extends('layouts.main')

@section('title', $user->username)

@push('js')
    @vite(['resources/js/users/show.js'])
@endpush

@section('content')
    <div class="container">
        @if ($user->id !== Auth::user()->id)
            <div class="row">
                <div class="col">
                    <div class="alert alert-warning d-flex align-items-center">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        {{ __('users.show.notifications.be_safe') }}
                        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col">
                <div class="alert alert-primary d-flex align-items-center">
                    <i class="bi bi-exclamation-circle me-2"></i>
                    {{ __('users.show.notifications.unique_points') }}
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <span class="h4">{{ $user->username }}</span>
                <span> - </span>
                <a href="{{ route('reputations.create', ['user' => $user]) }}" class="text-decoration-none text-reset fs-5"
                    id="add-vote" data-bs-toggle="tooltip" data-bs-placement="bottom"
                    data-bs-title="{{ __('users.show.vote') }}">
                    <span class="text-success fw-medium"><i class="bi bi-arrow-up"></i>{{ $pointsTotal['positive'] }}</span>
                    <span>/</span>
                    <span class="text-danger fw-medium"><i
                            class="bi bi-arrow-down"></i>{{ $pointsTotal['negative'] }}</span>
                </a>
            </div>
            <div class="col text-end">
                <i>
                    <span class="text-muted">
                        {{ __('users.show.joined_at', ['date' => $user->created_at->translatedFormat('j \\d\\e F, Y')]) }}
                    </span>
                </i>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <i class="bi bi-mailbox"></i> {{ $user->email }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <i class="bi bi-whatsapp"></i> +585555555555</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <span class="h4">{{ __('users.show.rep_history.heading') }}</span>
            </div>
        </div>
        <div class="row mb-3 mt-3">
            <div class="col-4">
                <form class="d-flex align-items-center">
                    <label for="filter-type" class="form-label me-2">
                        <i class="bi bi-funnel-fill"></i>
                    </label>
                    <select id="filter-type" class="form-select me-2">
                        <option @selected(!request()->has('filter'))>Mostrar todas</option>
                        <option @selected(request()->filter === 'negatives') value="negatives">
                            {{ __('users.show.rep_history.only_negatives') }}</option>
                        <option @selected(request()->filter === 'positives') value="positives">
                            {{ __('users.show.rep_history.only_positives') }}</option>
                    </select>
                </form>
            </div>
            <div class="col-8 text-end">
                @if (request()->order === 'asc')
                    <a class="text-decoration-none text-reset"
                        href="{{ route('users.show', array_merge(request()->query(), ['user' => $user, 'order' => 'desc'])) }}">
                        <i class="bi bi-sort-up fs-3 clickable" data-bs-toggle="tooltip" data-bs-placement="bottom"
                            data-bs-title="{{ __('users.show.rep_history.desc') }}"></i>
                    </a>
                @else
                    <a href="{{ route('users.show', array_merge(request()->query(), ['user' => $user, 'order' => 'asc'])) }}"
                        class="text-decoration-none text-reset">
                        <i class="bi bi-sort-down fs-3" data-bs-toggle="tooltip" data-bs-placement="bottom"
                            data-bs-title="{{ __('users.show.rep_history.asc') }}"></i>
                    </a>
                @endif
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">{{ __('users.show.rep_history.columns.giver') }}</th>
                    <th scope="col">{{ __('users.show.rep_history.columns.type') }}</th>
                    <th scope="col">{{ __('users.show.rep_history.columns.transactions') }}</th>
                    <th scope="col">{{ __('users.show.rep_history.columns.created_at') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reputations as $reputation)
                    <tr>
                        <th scope="row">
                            <a href="{{ route('users.show', $reputation->issuer) }}">
                                {{ $reputation->issuer->username }}
                            </a>
                        </th>
                        <td>
                            @if ($reputation->type === $positiveReputation)
                                <span class="text-success">
                                    <i class="bi bi-arrow-up"></i>{{ __('reputations.create.inputs.types.positive') }}
                                </span>
                            @else
                                <span class="text-danger">
                                    <i class="bi bi-arrow-down"></i>{{ __('reputations.create.inputs.types.negative') }}
                                </span>
                            @endif
                        </td>
                        <td>{{ implode(', ', $reputation->getRecommendedTransactions()) }}</td>
                        <td>{{ $reputation->created_at->translatedFormat('j \\d\\e F, Y \\a \\l\\a\\s H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $reputations->links() }}
    </div>
@endsection
