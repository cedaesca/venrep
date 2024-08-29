@extends('layouts.main')

@section('title', __('auth.inputs.login'))

@section('content')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card card-white-transparent col-md-4 p-4">
            <div class="card-body">
                <h2 class="text-center mb-4">{{ __('auth.inputs.login') }}</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('auth.register.inputs.email') }}</label>
                        <input type="email" name="email" class="form-control" id="email"
                            placeholder="juanito@ejemplo.com" value="{{ old('email') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('auth.register.inputs.password') }}</label>
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="{{ __('auth.register.inputs.password') }}" required>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label" for="remember">
                            {{ __('auth.inputs.remember_me') }}
                        </label>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary w-100">{{ __('auth.inputs.login') }}</button>
                    <div class="d-flex justify-content-between mt-3">
                        <a href="{{ route('register') }}"
                            class="text-decoration-none">{{ __('auth.register.create_account') }}</a>
                        <a href="{{ route('password.request') }}"
                            class="text-decoration-none">{{ __('auth.forgot_password.forgot_password') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
