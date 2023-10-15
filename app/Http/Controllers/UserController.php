<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showLogin()
    {
        return view('welcome');
    }

    public function auth(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('Home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'foto_de_perfil' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adicione regras de validação aqui
        ]);

        $perfil = new Perfil();
        $perfil->nome = $request->nome;

        if ($request->hasFile('foto_de_perfil')) {
            $perfil->foto_de_perfil = $request->file('foto_de_perfil')->store('perfis');
        }

        $perfil->save();

        return "Foto de perfil enviada com sucesso!";
    }
}
