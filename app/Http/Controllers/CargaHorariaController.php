<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CargaHorariaController extends Controller
{
    public function cargaHoraria()
    {
        $id = Auth::id();
        $Mes = date('m');
        $Ano = date('Y');

        $dias = cal_days_in_month ( CAL_GREGORIAN, $Mes , $Ano );
        // $query = DB::select("SELECT `dia` FROM `horarios` WHERE WEEKDAY (`dia`) != 5 and WEEKDAY (`dia`) != 6");
        
        // $query = DB::table('horarios')
        // ->where('userid', $id)
        // ->whereRaw('WEEKDAY(dia) != 5')
        // ->whereRaw('WEEKDAY(dia) != 6')
        // ->get();
        
        $query = DB::table('horarios')
        ->where('userid', $id)
        ->whereMonth('dia', $Mes)
        ->whereRaw('WEEKDAY(dia) != 5')
        ->whereRaw('WEEKDAY(dia) != 6')
        ->get();

        $soma = 0;

        foreach ($query as $item) {
            $soma =  $soma + 1;
        };
        
     echo $soma;
    }
}
