<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $validation = $request->validate([
            'email'=>['required','email'],
            'password'=>['required']
        ],
        [
            'email.required'=>'Informe o email!',
            'email.email'=>'Informe o email no formato correto!',
            'password.required'=>'Informe a palavra passe!',
        ]);
        return $next($request);
    }
}
