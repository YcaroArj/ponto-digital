<?php

namespace App\Http\Controllers\local\user;

use App\Http\Controllers\local\AbstractBaseController;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends AbstractBaseController
{
    protected $dangerMessage;
    public function __construct()
    {
        date_default_timezone_set('America/Sao_Paulo');
        parent::__construct();
        $this->pagesPath = 'welcome';
        $this->dangerMessage = "E-mail ou senha incorretos";
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

        return redirect()->back()->with('danger', $this->dangerMessage);
    }

    public function fazerLogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
