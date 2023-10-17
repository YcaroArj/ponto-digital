<?php

use App\Http\Controllers\local\central\GetTimeController;
use Illuminate\Support\Facades\Route;

Route::controller(GetTimeController::class)->group(function () {
    Route::get('/', 'index')->name('bater_ponto');
    Route::post('cadastrarhorario/entrada', 'getEntryTime')->name('Entrada');
    Route::post('cadastrarhorario/saidaAlmoco', 'getLunchTime')->name('SaidaAlmoco');
    Route::post('cadastrarhorario/retornoAlmoco', 'getReturnTime')->name('RetornoAlmoco');
    Route::post('cadastrarhorario/saida', 'getExit')->name('Saida');
});
