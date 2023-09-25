<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;

class CadastrarHorarioController extends Controller
{

    public function registrarHorarios(Request $request)
    {
        $data = $request->all();

        Horario::create($data);

        return view('pages.central.bater_ponto.ponto');
    }
}
