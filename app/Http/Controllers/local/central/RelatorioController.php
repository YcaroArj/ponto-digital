<?php

namespace App\Http\Controllers\local\central;

use App\Http\Controllers\local\AbstractBaseController;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RelatorioController extends AbstractBaseController
{

    public function __construct()
    {
        date_default_timezone_set('America/Sao_Paulo');
        parent::__construct();
        $this->pagesPath = 'pages.central.relatorio.lista';
    }

    public function WorkedHours()
    {
        $id = Auth::id();
        $month = date('m');

        $getMonth = DB::table('horarios')
            ->where('userid', $id)
            ->whereMonth('dia', $month)
            ->get();

        $getAll = DB::table('horarios')
            ->where('userid', $id)
            ->get();

        $sumTimeWorked = 0;

        /*---- Calcula as Horas Trabalhadas----*/
        foreach ($getMonth as $item) {
            $getEntry = $item->entrada;
            $getExit = $item->saida;

            $entry = intval(($getEntry));
            $exit = intval(($getExit));

            if ($exit != null) {
                $sumTimeWorked = $sumTimeWorked + ($exit - $entry);
            }
        };

        $getRole = DB::select("SELECT cargo FROM funcionarios WHERE id = '$id' AND cargo = 'Estagiário'");

        if ($getRole) {
            $workload = "96";
        } else {
            $workload = "200";
        }

        /*---- Verifica Se o Funcionario faltou Ignorando Sabados e Domingos ----*/
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $today = Carbon::now()->day;

        $fouls = 0;

        for ($day = 1; $day <= $today; $day++) {
            $date = Carbon::create($currentYear, $currentMonth, $day);

            if (!$date->isWeekend()) {

                $horariosDoDia = DB::table('horarios')
                    ->where('userid', $id)
                    ->whereDate('dia', $date->toDateString())
                    ->count();

                if ($horariosDoDia == null) {
                    $fouls++;
                }
            }
        }

        // Calcula as horas extras
        $getTime = DB::table('horarios')
            ->where('userid', $id)
            ->whereMonth('dia', $month)
            ->get();

        $totalOverTime = 0;

        foreach ($getTime as $item) {
            $checkWorkloadByRole = DB::select("SELECT cargo FROM funcionarios WHERE id = '$id' AND cargo = 'Estagiário'");

            $entry = Carbon::parse($item->entrada);
            $exit = Carbon::parse($item->saida);
            $workedHours = $entry->diffInHours($exit);

            if ($checkWorkloadByRole) {
                $overTime = max($workedHours - 6, 0);
            } else {
                $overTime = max($workedHours - 8, 0);
            }

            $totalOverTime = $totalOverTime  + $overTime;
        }
        $img = DB::select("SELECT `image` FROM `funcionarios` WHERE `id` = '$id'");
        $data = array(
            'sumTimeWorked' => $sumTimeWorked,
            'getMonth' => $getMonth,
            'workload' => $workload,
            'getAll' => $getAll,
            'totalOverTime' => $totalOverTime,
            'fouls' => $fouls,
            'img' => $img
        );

        return view('pages.central.relatorio.lista')->with($data);
    }
}
