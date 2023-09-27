<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CadastrarHorarioController extends Controller
{

    public function registrarEntrada()
    {

        $id = Auth::id();
        $dia = date('Y:m:d');
        $horaNow = now();
        $hora = array(
            'userid' => $id,
            'dia' => $dia,
            'entrada' => $horaNow
        );

        Horario::create($hora);

        return redirect()->back();
    }

    public function registrarSaidaAlmoco()
    {
        $id = Auth::id();
        $dia = date('Y:m:d');
        $horaNow = now();
        $hora = array(
            'userid' => $id,
            'dia' => $dia,
            'saidaAlmoco' => $horaNow
        );

        Horario::create($hora);

        return redirect()->back();
    }
    /*
    public function registrarRetornoAlmoco(Request $request)
    {

        date_default_timezone_set('America/Sao_Paulo');
        $horaNow = date('H:m:s');
         $hora = array(
            'retornoAlmoco' => $horaNow
        );

        Horario::create($hora);

        return redirect()->back();
    }

    public function registrarSaida(Request $request)
    {

        date_default_timezone_set('America/Sao_Paulo');
        $horaNow = date('H:m:s');
         $hora = array(
            'saida' => $horaNow
        );

        Horario::create($hora);

        return redirect()->back();
    }*/
}
