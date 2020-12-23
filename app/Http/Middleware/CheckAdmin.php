<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->level == '1') {
                return $next($request);
            } else {
                return response('Acesso negado. Você precisa estar logado em uma conta de adminsitrador para acessar esta página.', 403);
            }
        } else {
            return response('Acesso negado. Você precisa estar logado para acessar esta página.', 403);
        }
    }
}
