<?php

namespace App\Http\Controllers\local\central;

use App\Http\Controllers\local\AbstractBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PerfilController extends AbstractBaseController
{
    public function __construct()
    {
        date_default_timezone_set('America/Sao_Paulo');
        parent::__construct();
        $this->pagesPath = 'pages.funcionario.perfil';
    }

    public function store()
    {
        $id = Auth::id();
        $data = DB::select("SELECT `image` FROM `funcionarios` WHERE `id` = '$id'");
        $data = array(
            'data' => $data,
        );

        return view('pages.funcionario.perfil')->with($data);
    }

    public function UploadIcon(Request $request)
    {
        $id = Auth::id();
        $data = $request->all();
        $fileName = time() . $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('icons', $fileName, 'custom');
        $query = DB::select("SELECT `image` FROM `funcionarios` WHERE `id` = '$id'");

        if ($query) {
            DB::table('funcionarios')
                ->where('id', $id)
                ->update(['image' => $path]);
        }

        return redirect()->back();
    }
}
