@extends('layouts.main')

@section('title', __('auth.verify_email.view_title'))

@section('content')
    @if ($errors->has('throttled'))
        <div>
            {{ $errors->first('throttled') }}
        </div>
    @else
        <div>
            {{ __('auth.verify_email.notification', ['email' => Auth::user()->email]) }}
        </div>
    @endif
    <br>
    <div>
        {{ __('auth.verify_email.no_email_received_prompt') }}
        <div>
            <form id="resend-verification" action="{{ route('verification.send') }}" method="POST">
                @csrf
                <button id="submit-verification" type="submit">{{ __('auth.verify_email.resend_email') }}</button>
                <span id="resend-message">
            </form>
        </div>
    </div>
    </div>
@endsection
