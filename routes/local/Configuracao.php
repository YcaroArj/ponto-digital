<?php

use App\Http\Controllers\local\central\ConfiguracaoController;
use Illuminate\Support\Facades\Route;

Route::controller(ConfiguracaoController::class)->group(function () {
    Route::get('/Configuracao', 'index')->name('configuracao');
});
