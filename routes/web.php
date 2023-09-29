<?php

use App\Http\Controllers\CadastrarHorarioController;
use App\Http\Controllers\CadastrarFuncionarioController;
use App\Http\Controllers\CalcularHoraController;
use App\Http\Controllers\RotasController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'showLogin'])->name('login.page');
Route::get('/auth', [UserController::class, 'auth'])->name('auth.user');
Route::post('/', [CadastrarFuncionarioController::class, 'CadFuncionario'])->name('Cad.user');


Route::get('/post', function () {
    // $horas = DB::select("SELECT entrada FROM horarios WHERE entrada");
    $dia = date('Y-m-d');
    $teste1 = DB::table('horarios')->where('dia', $dia)->get();

    foreach($teste1 as $item){
        echo $item->entrada;
        echo '<br>';
        echo $item->saidaAlmoco;
        echo '<br>';
        echo $item->retornoAlmoco;
        echo '<br>';
        echo $item->saida;

        $horaEntrada = $item->entrada;
        $horaSAlmoco = $item->saida;

        $entrada = strtotime($horaEntrada);
        $almoco = strtotime($horaSAlmoco);

        echo '<br> <br> <br>';
        echo "Horario de Entrada: " . floatval(date('h.i', $entrada));
        echo '<br> <br> <br>';
        echo "Horario de Saida para Almoço: " . floatval(date('h.i', $almoco));
        echo '<br> <br> <br>';





        
        $calculoHora = floatval(date('h.i', $almoco)-date('h.i', $entrada));
        echo $calculoHora;
        echo '<br> <br> <br>';
        $hour = floatval(date('h',$calculoHora));
        $minutos = floatval(date('i',$calculoHora));
        for( $i = $hour; $minutos >= 60 ; $i++ ){
           echo $i; 
         };










        
        
    };

});

Route::prefix('dashboard')->middleware('web')->group(function () {

    Route::post('/EntradaT1', [CadastrarHorarioController::class, 'registrarEntrada'])->name('Entrada');
    Route::post('/', [CadastrarHorarioController::class, 'registrarSaidaAlmoco'])->name('SaidaAlmoco');
    Route::post('/EntradaT2', [CadastrarHorarioController::class, 'registrarRetornoAlmoco'])->name('RetornoAlmoco');
    Route::post('/SaidaT2', [CadastrarHorarioController::class, 'registrarSaida'])->name('Saida');

    Route::middleware('web')->group(function () {
        Route::get('/', [RotasController::class, 'showCentral'])->name('dashboard');
        Route::get('/BaterPonto', [RotasController::class, 'showPonto'])->name('bater_ponto');
        Route::get('/relatorio', [RotasController::class, 'showRelatorio'])->name('relatorio');
        Route::get('/Help', [RotasController::class, 'showHelp'])->name('help');
    });
});
