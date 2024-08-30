@extends('layouts.main')

@section('title', $user->username)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <span class="h4">{{ $user->username }}</span>
                <span> - </span>
                <a href="#" class="text-decoration-none text-reset" id="add-vote" data-bs-toggle="tooltip"
                    data-bs-placement="bottom" data-bs-title="{{ __('users.show.vote') }}">
                    <span class="text-success fw-medium"><i class="bi bi-arrow-up"></i>1</span>
                    <span>/</span>
                    <span class="text-danger fw-medium"><i class="bi bi-arrow-down"></i>1</span>
                </a>
            </div>
            <div class="col text-end">
                <i>
                    <span class="text-muted">
                        {{ __('users.show.joined_at', ['date' => $user->created_at->translatedFormat('j \\d\\e F, Y')]) }}
                    </span>
                </i>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <i class="bi bi-mailbox"></i> {{ $user->email }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <i class="bi bi-whatsapp"></i> +585555555555</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <span class="h4">{{ __('users.show.rep_history.heading') }}</span>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="alert alert-primary d-flex align-items-center">
                    <i class="bi bi-exclamation-circle me-2"></i>
                    {{ __('users.show.notifications.unique_points') }}
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-4">
                <form class="d-flex align-items-center">
                    <label for="filter-type" class="form-label me-2">
                        <i class="bi bi-funnel-fill"></i>
                    </label>
                    <select id="filter-type" class="form-select me-2">
                        <option selected>Mostrar todas</option>
                        <option>Mostrar solo negativas</option>
                        <option>Mostrar solo positivas</option>
                    </select>
                </form>
            </div>
            <div class="col-8 text-end">
                <i class="bi bi-sort-up fs-3 clickable" data-bs-toggle="tooltip" data-bs-placement="bottom"
                    data-bs-title="{{ __('general.orders.asc') }}"></i>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">{{ __('users.show.rep_history.columns.giver') }}</th>
                    <th scope="col">{{ __('users.show.rep_history.columns.type') }}</th>
                    <th scope="col">{{ __('users.show.rep_history.columns.transactions') }}</th>
                    <th scope="col">{{ __('users.show.rep_history.columns.date') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">cedaesca</th>
                    <td><span class="text-success"><i class="bi bi-arrow-up"></i>Positiva</span></td>
                    <td>Zelle, USDT, Bolívares</td>
                    <td>> USD 500</td>
                    <td>hoy</td>
                </tr>
                <tr>
                    <th scope="row">danhou</th>
                    <td><span class="text-danger"><i class="bi bi-arrow-down"></i>Negativa</span></td>
                    <td>Zelle, USDT, Bolívares</td>
                    <td>> USD 500</td>
                    <td>hoy</td>
                </tr>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link">{{ __('pagination.previous') }}</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">{{ __('pagination.next') }}</a>
                </li>
            </ul>
        </nav>
    </div>
@endsection
