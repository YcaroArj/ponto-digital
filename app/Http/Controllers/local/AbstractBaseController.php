<?php

namespace App\Http\Controllers\local;

use App\Http\Controllers\Controller;
use App\Services\BaseService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

abstract class AbstractBaseController extends Controller
{
    protected $service;
    protected $pagesPath;
    protected $compactVariaveis;
    protected $fields;
    protected $entity;

    public function __construct()
    {
        // $this->service = new BaseService();
    }

    public function index()
    {
        $compact = [];

        if (isset($this->compactVariaveis)) {
            foreach ($this->compactVariaveis as $key => $variavel) {
                array_push($compact, $variavel);
                $varAbstract[$variavel] = $this->{$variavel};
                extract($varAbstract, EXTR_SKIP);
            }
        }

        return view($this->pagesPath, compact($compact));
    }
}
