<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('auth.forgot_password.view_title') }} - {{ config('app.name') }}</title>
</head>

<body>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('status'))
        <div>
            {{ session('status') }}
        </div>
    @endif
    <form action="{{ route('password.request') }}" method="post">
        @csrf
        <label for="email">{{ __('auth.register.inputs.email') }}</label>
        <br>
        <input type="email" name="email" id="email">
        <br>
        <button type="submit">{{ __('general.submit') }}</button>
    </form>
</body>

</html>
