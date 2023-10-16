<?php

use App\Http\Controllers\local\central\RelatorioController;
use Illuminate\Support\Facades\Route;

Route::controller(RelatorioController::class)->group(function () {
    Route::get('/relatorio', 'HorasTrabalhadas')->name('relatorio');
});
