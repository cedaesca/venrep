@extends('layouts.main')

@section('title', __('auth.forgot_password.view_title'))

@section('content')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card card-white-transparent col-md-6 p-4">
            <div class="card-body">
                <h2 class="text-center mb-4">{{ __('auth.forgot_password.view_title') }}</h2>
                @if (session('status') || $errors->any())
                    <div class="alert alert-success">
                        {{ __('passwords.sent') }}
                    </div>
                @endif

                <form action="{{ route('password.request') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('auth.register.inputs.email') }}</label>
                        <input type="email" name="email" class="form-control" id="email"
                            placeholder="juanito@ejemplo.com" value="{{ old('email') }}" required>
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
