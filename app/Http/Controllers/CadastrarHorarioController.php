<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CadastrarHorarioController extends Controller
{

    public function registrarEntrada()
    {
        date_default_timezone_set('America/Sao_Paulo');
        $id = Auth::id();
        $dia = date('Y:m:d');
        $horaNow = date('H:m:s');
        $hora = array(
            'userid' => $id,
            'dia' => $dia,
            'entrada' => $horaNow
        );
        // $diaAtual = DB::select('SELECT dia FROM horarios WHERE dia,' , $dia);
        $diaAtual = DB::select("SELECT dia FROM horarios WHERE dia = '$dia'");
        if($diaAtual){
            
        }else{
            Horario::create($hora);
        }
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

        // $diaAtual = DB::select('SELECT dia FROM horarios WHERE dia,' , $dia);
        $diaAtual = DB::select("SELECT dia FROM horarios WHERE dia = '$dia'");
        if($diaAtual){
            Horario::updated("UPDATE saidaAlmoco FROM horarios WHERE dia = '$dia'");
        }else{
           
        }

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