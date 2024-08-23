<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckMedico
{
    public function handle($request, Closure $next)
    {
        // Verifica se o usuário é um médico
        if (Auth::check() && Auth::user()->tipo === 'medico') {
            return $next($request);
        }

        // Redireciona para a página principal com mensagem de erro se não for médico
        return redirect('/dashboard')->withErrors('Acesso negado. Somente médicos podem acessar esta página.');
    }
}
