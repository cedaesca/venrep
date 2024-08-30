@extends('layouts.main')

@section('title', __('reputations.create.view_title', ['username' => $user->username]))

@section('content')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card card-white-transparent col-md-6 p-4">
            <div class="card-body">
                <h2 class="text-center mb-4">{{ __('reputations.create.create', ['username' => $user->username]) }}</h2>
                <form action="{{ route('reputations.store', $user) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="rep-type" class="form-label">{{ __('reputations.create.inputs.rep_type') }}</label>
                        <select class="form-select @error('rep_type') is-invalid @enderror" id='rep-type' name="rep_type"
                            required>
                            <option selected>{{ __('reputations.create.inputs.select_prompt') }}</option>
                            <option value="{{ $reputationTypes['positive'] }}">
                                {{ __('reputations.create.inputs.types.positive') }}</option>
                            <option value="{{ $reputationTypes['negative'] }}">
                                {{ __('reputations.create.inputs.types.negative') }}</option>
                        </select>
                        @error('rep_type')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('reputations.create.inputs.recommended_transactions') }}</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="recommends-zelle"
                                name="recommended_transactions[]" value="recommends_zelle">
                            <label class="form-check-label"
                                for="recommends-zelle">{{ __('reputations.create.inputs.transaction_options.zelle') }}</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="recommends-binance"
                                name="recommended_transactions[]" value="recommends_binance">
                            <label class="form-check-label"
                                for="recommends-binance">{{ __('reputations.create.inputs.transaction_options.binance') }}</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="recommends-cash"
                                name="recommended_transactions[]" value="recommends_cash">
                            <label class="form-check-label"
                                for="recommends-cash">{{ __('reputations.create.inputs.transaction_options.cash') }}</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="recommends-ves"
                                name="recommended_transactions[]" value="recommends_ves">
                            <label class="form-check-label"
                                for="ves">{{ __('reputations.create.inputs.transaction_options.ves') }}</label>
                        </div>
                    </div>
                    <hr>
                    <button type="submit"
                        class="btn btn-primary w-100">{{ __('reputations.create.inputs.submit') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
