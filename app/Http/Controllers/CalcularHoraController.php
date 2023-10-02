<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CalcularHoraController extends Controller
{

    public function HorasTrabalhadas()
    {
        $id = Auth::id();
        $dia = date('m');
        $dia = date('Y-m-d');
        $teste1 = DB::table('horarios')->where('userid', $id)->where(MONTH, '');
        $soma = 0;
        foreach ($teste1 as $item) {
            $horaEntrada = $item->entrada;
            $horaSaida = $item->saida;

            $HEntrada = intval(($horaEntrada));
            $HSaida = intval(($horaSaida));

           
            $soma = $soma + ($HSaida - $HEntrada) ;
            echo "<br>";
            echo $dia;
        };
        echo "<br>";
        echo $soma;
    }
}
