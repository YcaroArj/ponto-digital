<?php

namespace App\Http\Controllers;

use App\Models\user;

use Illuminate\Http\Request;

class CadastrarFuncionarioController extends Controller
{
    public function CadFuncionario(Request $request)
    {
        $data = $request->all();

        User::create($data);

        return view('welcome');
    }
}
