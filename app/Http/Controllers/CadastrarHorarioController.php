<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CadastrarHorarioController extends Controller
{

    public function registrarEntrada(Request $request)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $dia = date('Y:m:d');
        $horaNow = date('H:m:s');
         $hora = array(
            'userid'=> ,
            'dia' => $dia,
            'entrada' => $horaNow
        );

        Horario::create($hora);

        return view('pages.central.bater_ponto.ponto');
    }
    
   /* public function registrarSaidaAlmoco(Request $request)
    {
        
        date_default_timezone_set('America/Sao_Paulo');
        $horaNow = date('H:m:s');
         $hora = array(
            'SaidaAlmoco' => $horaNow
        );

        Horario::create($hora);

        return view('pages.central.bater_ponto.ponto');
    }
    public function registrarRetornoAlmoco(Request $request)
    {
        
        date_default_timezone_set('America/Sao_Paulo');
        $horaNow = date('H:m:s');
         $hora = array(
            'retornoAlmoco' => $horaNow
        );

        Horario::create($hora);

        return view('pages.central.bater_ponto.ponto');
    }

    public function registrarSaida(Request $request)
    {
        
        date_default_timezone_set('America/Sao_Paulo');
        $horaNow = date('H:m:s');
         $hora = array(
            'saida' => $horaNow
        );

        Horario::create($hora);

        return view('pages.central.bater_ponto.ponto');
    }*/
}
