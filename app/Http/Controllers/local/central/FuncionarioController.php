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
    protected $errorMessage;
    protected $errorEmailMessage;
    protected $successMessage;
    protected $successCreateMessage;
    protected $deletMessage;

    public function __construct()
    {
        date_default_timezone_set('America/Sao_Paulo');
        parent::__construct();
        $this->pagesPath = 'pages.central.funcionario.lista';
        $this->errorMessage = 'Erro ao Cadastrar usuário: Por favor, preencha todos os campos corretamente!!';
        $this->errorEmailMessage = 'Erro ao Cadastrar usuário: o campo E-mail já esta sendo utilizado!!';
        $this->successMessage = 'Dados Atualizados com Sucesso!!';
        $this->successCreateMessage = 'Usuário Cadastrado com com Sucesso!!';
        $this->deletMessage = 'Usuário apagado com sucesso!!';
    }

    public function TipoUsers()
    {
        $queryUsers = DB::table('funcionarios')
            ->get();

        // $data = array(
        //     'queryUsers' => $queryUsers
        // );

        return view('layout.template', ['queryUsers' => $queryUsers]);
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
        if (User::where('email', $data['email'])->exists()) {
            return redirect()->back()->with('error', $this->errorEmailMessage);
        } elseif (empty($data['password'])) {

            return redirect()->back()->with('error', $this->errorMessage);
        } else {
            $data['password'] = Hash::make($data['password']);
            User::create($data);
            return redirect()->back()->with('success', $this->successCreateMessage);
        }
    }

    public function update(Request $request, $id)
    {

        $data = [
            'nome' => $request->nome,
            'email' => $request->email,
            'image' => $request->image,
            'cargo' => $request->cargo,
            'TipoContrato' => $request->TipoContrato,
            'password' => $request->password,
            'TipoUsuario' => $request->TipoUsuario,
        ];

        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = bcrypt($data['password']);
        }

        if ($request->hasFile('image')) {
            $fileName = time() . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('icons', $fileName, 'custom');

            $data['image'] = $path;
        }

        User::where('id', $id)->update($data);

        return redirect()->back()->with('success', $this->successMessage);
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect()->back()->with('delet', $this->deletMessage);
    }
}
