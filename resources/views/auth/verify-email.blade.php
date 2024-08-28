<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verificar correo electrónico - {{ config('app.name') }}</title>
    @vite('resources/js/auth/verify-email.js')
</head>

<body>
    <div>
        {{ __('verify_email.notification', ['email' => Auth::user()->email]) }}
    </div>
    <br>
    <div>
        {{ __('verify_email.no_email_received_prompt') }}
        <div>
            <form id="resend-verification" action="{{ route('verification.send') }}" method="POST">
                @csrf
                @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <button id="submit-verification" type="submit">{{ __('verify_email.resend_email') }}</button>
                <span id="resend-message">
        </div>
        </form>
    </div>
    </div>
</body>

</html>
