<?php

use App\Http\Controllers\CadastrarHorarioController;
use App\Http\Controllers\CadastrarFuncionarioController;
use App\Http\Controllers\RotasController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/getDia', function(){
    $data = date('Y-m-d');
    $diaAtual = DB::select("SELECT dia FROM horarios WHERE dia = '$data'");
    dd($diaAtual);
    return view ('test');
});

Route::get('/', [UserController::class, 'showLogin'])->name('login.page');
Route::get('/auth', [UserController::class, 'auth'])->name('auth.user');
Route::post('/', [CadastrarFuncionarioController::class, 'CadFuncionario'])->name('Cad.user');


Route::prefix('dashboard')->middleware('web')->group(function () {

    Route::post('/Entrada', [CadastrarHorarioController::class, 'registrarEntrada'])->name('Entrada');
    Route::post('/', [CadastrarHorarioController::class, 'registrarSaidaAlmoco'])->name('SaidaAlmoco');
    Route::get('/getDia', [CadastrarHorarioController::class, 'getDia'])->name('getDia');
    // Route::post('/', [CadastrarHorarioController::class, 'registrarRetornoAlmoco'])->name('RetornoAlmoco');
    // Route::post('/', [CadastrarHorarioController::class, 'registrarSaida'])->name('Saida');

    Route::middleware('web')->group(function () {
        Route::get('/', [RotasController::class, 'showCentral'])->name('dashboard');
        Route::get('/BaterPonto', [RotasController::class, 'showPonto'])->name('bater_ponto');
        Route::get('/relatorio', [RotasController::class, 'showRelatorio'])->name('relatorio');
        Route::get('/Help', [RotasController::class, 'showHelp'])->name('help');
    });
});
