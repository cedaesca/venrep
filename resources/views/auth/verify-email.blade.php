@extends('layouts.main')

@section('title', __('auth.verify_email.view_title'))

@section('content')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card card-white-transparent col-md-6 p-4">
            <div class="card-body">
                <h2 class="text-center mb-4">
                    {{ __('auth.register.success') }}
                </h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <p>
                    {{ __('auth.verify_email.notification', ['email' => Auth::user()->email]) }}
                </p>

                <hr>

                <form action="{{ route('verification.send') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary w-100">{{ __('auth.verify_email.resend_email') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <br>
    <div>
        {{ __('auth.verify_email.no_email_received_prompt') }}
        <div>
            <form id="resend-verification" action="{{ route('verification.send') }}" method="POST">
                @csrf
                <button id="submit-verification" type="submit">{{ __('auth.verify_email.resend_email') }}</button>
            </form>
        </div>
    </div>
    </div>
@endsection
