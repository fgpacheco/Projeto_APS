<?php

namespace web\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class CheckTipoUsuario {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$tipos) {
        /**
        $validacao = false;
        foreach ($tipos as $t) {
            if (Auth::user()->tipoUsuario->tipousuario == $t) {
                $validacao = true;
            }
        }
        if(!$validacao){
            return redirect('/');
        }
        */
        return $next($request);
    }

}
