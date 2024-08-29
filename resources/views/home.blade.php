@extends('layouts.main')

@section('title', __('general.home'))

@section('content')
    <div>
        <h1 class="h1">Bienvenido a {{ config('app.name') }}, {{ Auth::user()->username }}</h1>
    </div>
@endsection
