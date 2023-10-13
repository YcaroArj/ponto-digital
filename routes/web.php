<?php

use App\Http\Controllers\CadastrarHorarioController;
use App\Http\Controllers\CadastrarFuncionarioController;
use App\Http\Controllers\CalcularHoraController;
use App\Http\Controllers\RotasController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'showLogin'])->name('login.page');
Route::get('/auth', [UserController::class, 'auth'])->name('auth.user');
Route::post('/Cad', [CadastrarFuncionarioController::class, 'CadFuncionario'])->name('Cad.user');

Route::prefix('Home')->middleware('web')->group(function () {
    Route::post('/EntradaT1', [CadastrarHorarioController::class, 'registrarEntrada'])->name('Entrada');
    Route::post('/', [CadastrarHorarioController::class, 'registrarSaidaAlmoco'])->name('SaidaAlmoco');
    Route::post('/EntradaT2', [CadastrarHorarioController::class, 'registrarRetornoAlmoco'])->name('RetornoAlmoco');
    Route::post('/SaidaT2', [CadastrarHorarioController::class, 'registrarSaida'])->name('Saida');

    Route::middleware('web')->group(function () {
        Route::get('/', [RotasController::class, 'showPonto'])->name('bater_ponto');
        Route::get('/dashboard', [RotasController::class, 'showCentral'])->name('dashboard');
        Route::get('/relatorio', [CalcularHoraController::class, 'HorasTrabalhadas'])->name('relatorio');
        Route::get('/Help', [RotasController::class, 'showHelp'])->name('help');
        Route::get('/Perfil', [RotasController::class, 'showPerfil'])->name('perfil');
        Route::get('/Configuracao', [RotasController::class, 'showConfiguracao'])->name('configuracao');
    });
});
