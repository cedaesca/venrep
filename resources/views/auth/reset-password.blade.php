@extends('layouts.main')

@section('title', __('auth.reset_password.view_title'))

@section('content')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card card-white-transparent col-md-6 p-4">
            <div class="card-body">
                <h2 class="text-center mb-4">{{ __('auth.reset_password.view_title') }}</h2>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="{{ route('password.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{ request()->route('token') }}">
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('auth.register.inputs.email') }}</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" value="{{ request()->query('email') }}" readonly>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('auth.register.inputs.password') }}</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" placeholder="{{ __('auth.register.inputs.password') }}" required>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation"
                            class="form-label">{{ __('auth.register.inputs.password_confirmation') }}</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                            placeholder="{{ __('auth.register.inputs.password_confirmation') }}" required>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary w-100">{{ __('general.submit') }}</button>
                    <div class="d-flex justify-content-center mt-3">
                        <a href="{{ route('login') }}" class="text-decoration-none">{{ __('auth.inputs.login') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
