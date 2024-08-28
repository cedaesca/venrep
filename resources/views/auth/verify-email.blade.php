<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('verify_email.view_title') }} - {{ config('app.name') }}</title>
</head>

<body>
    @if ($errors->has('throttled'))
        <div>
            {{ $errors->first('throttled') }}
        </div>
    @else
        <div>
            {{ __('verify_email.notification', ['email' => Auth::user()->email]) }}
        </div>
    @endif
    <br>
    <div>
        {{ __('verify_email.no_email_received_prompt') }}
        <div>
            <div id='error-message' style="display: none;"></div>
            <form id="resend-verification" action="{{ route('verification.send') }}" method="POST">
                @csrf
                <button id="submit-verification" type="submit">{{ __('verify_email.resend_email') }}</button>
                <span id="resend-message">
            </form>
        </div>
    </div>
    </div>
</body>

</html>
