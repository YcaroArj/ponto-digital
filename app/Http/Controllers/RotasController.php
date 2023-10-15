<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RotasController extends Controller
{
    public function showCentral()
    {
        return view('pages.index.central');
    }

    public function showPonto()
    {
        return view('pages.central.bater_ponto.ponto');
    }

    public function showHelp()
    {
        return view('pages.central.help.help');
    }

    public function showConfiguracao()
    {
        return view('pages.funcionario.configuracao');
    }
}
