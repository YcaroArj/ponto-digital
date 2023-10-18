<?php

namespace App\Http\Controllers\local\central;

use App\Http\Controllers\local\AbstractBaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FuncionarioController extends AbstractBaseController
{
    protected $data;

    public function __construct()
    {
        date_default_timezone_set('America/Sao_Paulo');
        parent::__construct();
        $this->pagesPath = 'pages.central.funcionario.lista';
    }

    public function listUsers()
    {
        $queryUsers = DB::table('funcionarios')
            ->get();

        $data = array(
            'queryUsers' => $queryUsers
        );

        return view('pages.central.funcionario.lista')->with($data);
    }

    public function createUser(Request $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $data = [
            'nome' => $request->nome,
            'email' => $request->email,
            'cargo' => $request->cargo,
            'TipoContrato' => $request->TipoContrato,
            'password' => $request->password,
        ];
        $data['password'] = Hash::make($data['password']);
        User::where('id', $id)->update($data);
        return redirect()->back();
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect()->back();
    }
}
