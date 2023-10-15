<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PerfilController extends Controller
{
    public function store(Request $request)
    {
        $id = Auth::id();
        $data = $request->all();
        $query = DB::select("SELECT foto_de_perfil FROM funcionarios WHERE id = '$id'");

        if ($query) {
            DB::table('funcionarios')
                ->update(['foto_de_perfil' => $data]);
        }

        return view('pages.funcionario.perfil');
    }
}
