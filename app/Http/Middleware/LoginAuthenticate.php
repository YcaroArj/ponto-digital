<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$guards)
    {
        if (!$request->is('login.page')) {
            // Verifique a autenticação apenas para rotas que não sejam 'login.page'.
            if (Auth::guard($guards)->check()) {
                return $next($request);
            }
        } else {
            // Se a requisição for para 'login.page', permita o acesso sem autenticação.
            return $next($request);
        }

        // Se a requisição for para qualquer outra rota e o usuário não estiver autenticado, retorne um erro 404.
        abort(404);
    }
}
