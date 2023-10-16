<?php

use App\Http\Controllers\local\central\HelpController;
use Illuminate\Support\Facades\Route;

Route::controller(HelpController::class)->group(function () {
    Route::get('/Help', 'index')->name('help');
});
