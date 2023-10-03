<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CalcularHoraController extends Controller
{

    public function HorasTrabalhadas()
    {
        $id = Auth::id();
        $Mes = date('m');
        // $mesAtual = DB::select("SELECT dia FROM horarios WHERE MONTH(dia)=MONTH(NOW()) AND userid = '$id'");
        // var_dump($mesAtual);

        $MesAtual = DB::table('horarios')
            ->where('userid', $id)
            ->whereMonth('dia', $Mes)
            ->get();

        $soma = 0;

        foreach ($MesAtual as $item) {
            $dias = $item->dia;
            $horaEntradaT1 = $item->entrada;
            $horaSaidaT2 = $item->saida;

            $HEntrada = intval(($horaEntradaT1));
            $HSaida = intval(($horaSaidaT2));

            $soma = $soma + ($HSaida - $HEntrada);
            
           
        };
        $mes = $MesAtual;

        $data = array(
            'soma'=> $soma,
            'mes'=> $mes
        );

         return view('pages.central.relatorio.relatorio')->with($data);
    }
}
