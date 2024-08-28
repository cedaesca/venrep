<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('auth.view_title') }} - {{ config('app.name') }}</title>
</head>

<body>
    <form action="{{ route('login') }}" method="POST">
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
        <label for="email">{{ __('auth.register.inputs.email') }}</label>
        <br>
        <input type="email" id="email" name="email" value="{{ old('email') }}">
        <br>
        <label for="password">{{ __('auth.register.inputs.password') }}</label>
        <br>
        <input type="password" id="password" name="password">
        <br>
        <input type="checkbox" name="remember" id="remember">
        <label for="remember">{{ __('auth.inputs.remember_me') }}</label>
        <br>
        <button type="submit">{{ __('auth.inputs.login') }}</button>
        <br>
        <a href="{{ route('register') }}">{{ __('auth.register.create_account') }}</a>
        <br>
        <a href="{{ route('password.request') }}">{{ __('auth.forgot_password.forgot_password') }}</a>
    </form>
</body>

</html>
