<?php

use App\Http\Controllers\local\user\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->group(function () {
    Route::get('/', 'index')->name('login.page');
    Route::get('/auth', 'auth')->name('auth.user');
    Route::get('/logout', 'fazerLogout')->name('logout');
});
