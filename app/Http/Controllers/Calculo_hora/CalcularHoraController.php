<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class CalcularHoraController extends Controller
{

    public function HorasTrabalhadas(){
        
        $horas = DB::select("SELECT entrada FROM horarios WHERE entrada");
        echo "entrou";
    }
}
