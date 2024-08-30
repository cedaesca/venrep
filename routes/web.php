<?php

use App\Http\Controllers\ReputationsController;
use App\Http\Controllers\UsersController;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware([Authenticate::class, EnsureEmailIsVerified::class])->group(function () {
    Route::get('/', function () {
        return redirect()->to(route('users.show', Auth::user()));
    })->name('home');

    Route::controller(UsersController::class)->group(function () {
        $usersRoute = '/users';

        Route::get("{$usersRoute}/{user:username}", 'show')->name('users.show');
    });

    Route::controller(ReputationsController::class)->group(function () {
        $reputationsRoute = '/users/{user:username}/reputations';

        Route::get("{$reputationsRoute}/create", 'create')->name('reputations.create');
        Route::post("{$reputationsRoute}/create", 'store')->name('reputations.store');
    });
});
