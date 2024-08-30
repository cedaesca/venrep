<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - {{ config('app.name') }}</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>
    @auth
        <header role="navigation">
            <x-navbar />
        </header>
    @endauth
    <main class="pt-5">
        @yield('content')
    </main>
</body>

</html>
