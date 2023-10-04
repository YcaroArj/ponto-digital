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

        $MesAtual = DB::table('horarios')
            ->where('userid', $id)
            ->whereMonth('dia', $Mes)
            ->get();

        $soma = 0;

        foreach ($MesAtual as $item) {
            $horaEntradaT1 = $item->entrada;
            $horaSaidaT2 = $item->saida;

            $HEntrada = intval(($horaEntradaT1));
            $HSaida = intval(($horaSaidaT2));

            $soma = $soma + ($HSaida - $HEntrada);
        };
        $mes = $MesAtual;

        $cargo = DB::select("SELECT cargo FROM funcionarios WHERE id = '$id' AND cargo = 'Estagiário'");

        if ($cargo) {
            $cargaHoraria = "96";
        } else {
            $cargaHoraria = "200";
        }

        $data = array(
            'soma' => $soma,
            'mes' => $mes,
            'cargaHoraria' => $cargaHoraria
        );

        return view('pages.central.relatorio.relatorio')->with($data);
    }
}
