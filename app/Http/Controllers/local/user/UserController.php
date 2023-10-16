<?php

namespace App\Http\Controllers\local\user;

use App\Http\Controllers\local\AbstractBaseController;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends AbstractBaseController
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

    public function CadastrarFuncionario(Request $request)
    {
        $data = $request->all();

        User::create($data);

        return view('welcome');
    }
}
