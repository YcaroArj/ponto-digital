<?php

namespace App\Http\Controllers\local\central;

use App\Http\Controllers\local\AbstractBaseController;
use Illuminate\Http\Request;

class ConfiguracaoController extends AbstractBaseController
{
    public function __construct()
    {
        date_default_timezone_set('America/Sao_Paulo');
        parent::__construct();
        $this->pagesPath = 'pages.funcionario.configuracao';
    }
}
