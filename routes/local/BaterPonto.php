<?php

use App\Http\Controllers\local\central\CadastrarHorarioController;
use Illuminate\Support\Facades\Route;

Route::controller(CadastrarHorarioController::class)->group(function () {
    Route::get('/', 'index')->name('bater_ponto');
    Route::post('cadastrarhorario/entrada', 'registrarEntrada')->name('Entrada');
    Route::post('cadastrarhorario/saidaAlmoco', 'registrarSaidaAlmoco')->name('SaidaAlmoco');
    Route::post('cadastrarhorario/retornoAlmoco', 'registrarRetornoAlmoco')->name('RetornoAlmoco');
    Route::post('cadastrarhorario/saida', 'registrarSaida')->name('Saida');
});
