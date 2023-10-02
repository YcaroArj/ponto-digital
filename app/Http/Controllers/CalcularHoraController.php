<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class CalcularHoraController extends Controller
{

    public function HorasTrabalhadas()
    {
        $dia = date('Y-m-d');
        $teste1 = DB::table('horarios')->get();

        foreach ($teste1 as $item) {
            echo $item->entrada;
            echo '<br>';
            echo $item->saida;
            echo '<br>';

            $horaEntrada = $item->entrada;
            $horaSAlmoco = $item->saida;

            $entrada = strtotime($horaEntrada);
            $almoco = strtotime($horaSAlmoco);

            $calculoHora = floatval(date('h.i', $almoco) - date('h.i', $entrada));
            echo $calculoHora;
            echo '<br> <br> <br>';
        };



        function segundos_em_tempo($segundos)
        {
            $horas = floor($segundos / 3600);
            $minutos = floor($segundos % 3600 / 60);
            $segundos = $segundos % 60;

            return sprintf("%d:%02d:%02d", $horas, $minutos, $segundos);
        }

        $dia = date('Y-m-d');
        $teste1 = array(
            // $resgataHorario = DB::table('horarios')->where('dia', $dia)->get(),

            'entrada' => '10:12:13',
            'saida' => '15:18:48',

        );

        $soma = 0;

        foreach ($teste1 as $item) {


            list($horas, $minutos, $segundos) = explode(':', $item);
            $calc = $horas * 3600 + $minutos * 60 + $segundos;

            echo '<p>' . $item . ' - em segundos: ' . $calc . '</p>';

            $soma = $soma + $calc;
        };
        echo '<hr>';
        echo '<p>' . segundos_em_tempo($soma) . '</p>';
    }
}
