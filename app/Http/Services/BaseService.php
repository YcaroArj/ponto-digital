<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BaseService
{
    public function __construct()
    {
        locale_set_default("America/Sao_Paulo");
    }

    private function arrayDiaSemana($posicao)
    {
        $diaSemana = array('Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado');

        return $diaSemana[$posicao];
    }

    public function usuarioLogado()
    {
        return Auth::user();
    }
}
