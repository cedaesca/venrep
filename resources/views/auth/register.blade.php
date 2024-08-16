<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('register.view_title') }} - {{ config('app.name') }}</title>
</head>

<body>
    <form action="{{ route('register') }}" method="post">
        @csrf
        <label for="username">{{ __('register.inputs.username') }}</label>
        <br>
        <input id="username" name="username" type="text" value="{{ old('username') }}">
        <br>
        @error('username')
            <div>{{ $message }}</div>
            <br>
        @enderror
        <label for="email">{{ __('register.inputs.email') }}</label>
        <br>
        <input id="email" name="email" type="email" value="{{ old('email') }}">
        <br>
        @error('email')
            <div>{{ $message }}</div>
            <br>
        @enderror
        <label for="password">{{ __('register.inputs.password') }}</label>
        <br>
        <input id="password" name="password" type="password">
        <br>
        @error('password')
            <div>{{ $message }}</div>
            <br>
        @enderror
        <label for="password_confirmation">{{ __('register.inputs.password_confirmation') }}</label>
        <br>
        <input id="password_confirmation" name="password_confirmation" type="password">
        <br>
        @error('password_confirmation')
            <div>{{ $message }}</div>
            <br>
        @enderror
        <button type="submit">{{ __('register.inputs.register_button') }}</button>
        <br>
        <a href="{{ route('login') }}">{{ __('auth.inputs.login') }}</a>
    </form>
</body>

</html>
