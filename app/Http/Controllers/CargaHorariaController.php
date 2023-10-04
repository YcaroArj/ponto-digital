<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CargaHorariaController extends Controller
{
    public function cargaHoraria()
    {

        $cargo = Auth::cargo();
        $cargaHoraria = 0;

        if ($cargo = 'Estágiário') {
            $cargaHoraria = 96;
        } else {
            $cargaHoraria = 200;
        }

        $data = array(
            'cargaHoraria' => $cargaHoraria
        );

        return view('pages.central.relatorio.relatorio')->with($data);
    }
}
