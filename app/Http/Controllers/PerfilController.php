<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PerfilController extends Controller
{
    public function store(Request $request)
    {   
        $id = Auth::id();
        $data = DB::select("SELECT `image` FROM `funcionarios` WHERE `id` = '$id'");
        $data = array(
            'data'=> $data,
        );
        
        
        return view('pages.funcionario.perfil')->with($data);
    }

    public function UploadIcon (Request $request)
    {
        $id = Auth::id();
        $data = $request->all();
        $fileName = time().$request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('icons', $fileName, 'custom');
        $query = DB::select("SELECT `image` FROM `funcionarios` WHERE `id` = '$id'");

        if ($query) {
            DB::table('funcionarios')
                ->where('id', $id)
                ->update(['image' => $path]);
        }

        return redirect()->back();
    }

    public function AlterarDados(Request $request)
    {
        $id = Auth::id();
        $data = $request->all();
        
        dd($data);
    }
}
