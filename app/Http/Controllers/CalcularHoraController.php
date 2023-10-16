<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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

            $horaExtra = 0;
            if($HSaida != null){
                $soma = $soma + ($HSaida - $HEntrada);
                if($HEntrada - $HSaida > 8){
                    $horaEntradaT1 = 0;
                };
            }
        };
        $mes = $MesAtual;

        $cargo = DB::select("SELECT cargo FROM funcionarios WHERE id = '$id' AND cargo = 'Estagiário'");

        if ($cargo) {
            $cargaHoraria = "96";
            $cargaHorariaDiaria = 6;
        } else {
            $cargaHoraria = "200";
            $cargaHorariaDiaria = 8;
        }

        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $today = Carbon::now()->day;

        $faltas = 0;

        for ($day = 1; $day <= $today; $day++) {
            $date = Carbon::create($currentYear, $currentMonth, $day);

            if (!$date->isWeekend()) {

                $horariosDoDia = DB::table('horarios')
                    ->where('userid', $id)
                    ->whereDate('dia', $date->toDateString())
                    ->count();

                if ($horariosDoDia == null) {
                    $faltas++;
                }
            }
        }

         // Calcula as horas extras
         $horarios = DB::table('horarios')
         ->where('userid',$id)
         ->whereMonth('dia', $Mes)
         ->get();

     $totalHorasExtras = 0;

     foreach ($horarios as $horario) {
        $VerificarCargaHoraria = DB::select("SELECT cargo FROM funcionarios WHERE id = '$id' AND cargo = 'Estagiário'");

        $entrada = Carbon::parse($horario->entrada);
        $saida = Carbon::parse($horario->saida);
        $horasTrabalhadas = $entrada->diffInHours($saida);

        if ($VerificarCargaHoraria) {
            $horasExtras = max($horasTrabalhadas - 6, 0);
        } else {
            $horasExtras = max($horasTrabalhadas - 8, 0);
        }

         $totalHorasExtras = $totalHorasExtras + $horasExtras;
     }
        $img = DB::select("SELECT `image` FROM `funcionarios` WHERE `id` = '$id'");
        $data = array(
            'soma' => $soma,
            'mes' => $mes,
            'cargaHoraria' => $cargaHoraria,
            'totalHorasExtras' => $totalHorasExtras,
            'faltas' => $faltas,
            'img' => $img
        );

        return view('pages.central.relatorio.relatorio')->with($data);
    }
}
