<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class menuController extends Controller
{
    public function getDia(){
        $diaAtual = DB::select('SELECT dia, FROM horarios');
        echo $diaAtual;
        dd($diaAtual);
    }
}

