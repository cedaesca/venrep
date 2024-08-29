@extends('layouts.main')

@section('title', __('auth.register.view_title'))

@section('content')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card card-white-transparent col-md-6 p-4">
            <div class="card-body">
                <h2 class="text-center mb-4">{{ __('auth.register.view_title') }}</h2>
                @if (session('error'))
                    <div class="alert alert-danger mx-4">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">{{ __('auth.register.inputs.username') }}</label>
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                            id="username" value="{{ old('username') }}" placeholder="username" required>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('auth.register.inputs.email') }}</label>
                        <input type="email" name="email" class="form-control @error('username') is-invalid @enderror"
                            id="email" placeholder="juanito@ejemplo.com" value="{{ old('email') }}" required>
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
                        <input type="password" name="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            id="password_confirmation" placeholder="{{ __('auth.register.inputs.password_confirmation') }}"
                            required>
                        @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <hr>
                    <button type="submit"
                        class="btn btn-primary w-100">{{ __('auth.register.inputs.register_button') }}</button>
                    <div class="d-flex justify-content-center mt-3">
                        <a href="{{ route('login') }}"
                            class="text-decoration-none">{{ __('auth.register.already_registered') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
