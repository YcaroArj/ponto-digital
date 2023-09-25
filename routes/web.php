<?php

use App\Http\Controllers\CadastrarHorarioController;
use App\Http\Controllers\CadastrarFuncionarioController;
use App\Http\Controllers\RotasController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [UserController::class, 'showLogin'])->name('login.page');
Route::get('/auth', [UserController::class, 'auth'])->name('auth.user');
Route::post('/', [CadastrarFuncionarioController::class, 'CadFuncionario'])->name('Cad.user');


Route::prefix('dashboard')->middleware('web')->group(function () {

    Route::post('/', [CadastrarHorarioController::class, 'registrarHorarios'])->name('Cad.hora');

    Route::middleware('web')->group(function () {
        Route::get('/', [RotasController::class, 'showCentral'])->name('dashboard');
        Route::get('/BaterPonto', [RotasController::class, 'showPonto'])->name('bater_ponto');
        Route::get('/relatorio', [RotasController::class, 'showRelatorio'])->name('relatorio');
        Route::get('/Help', [RotasController::class, 'showHelp'])->name('help');
    });
});
