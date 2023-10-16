<?php

namespace App\Http\Controllers\local\central;

use App\Http\Controllers\local\AbstractBaseController;
use Illuminate\Http\Request;

class HelpController extends AbstractBaseController
{
    public function __construct()
    {
        date_default_timezone_set('America/Sao_Paulo');
        parent::__construct();
        $this->pagesPath = 'pages.central.help.lista';
    }
}
