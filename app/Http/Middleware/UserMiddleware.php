<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class UserMiddleware
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
            'email'=>['required', 'email'],
            'name'=> ['required'],
            'password' => ['required'],
            'conf_password' => ['required']
        ],
        [
            'email.required'=>'O email deve ser informado!',
            'email.email'=>'O email informado está em um formato inválido',
            'name.required'=>'O nome do utilizador deve ser informado!',
            'password.required'=>'A palavra passe do utilizador deve ser informada!',
            'conf_password.required'=>'O campo de confirmação da palavra passe do utilizador deve ser informada!',
        ]
        );

        $conf_password = $request->conf_password;
        $password = $request->password;

        if($conf_password === $password)
        {
            $checkDoubleRecord = User::where('email',$request->email)->first();
            if(is_null($checkDoubleRecord))
                return $next($request);
            else
            return redirect()->back()->with('error','Já exste um utilizador registado com o e email informado!');
        }
        else
        {
            return redirect()->back()->with('error','A palavra passe de confirmação difere da palavra passe definida');
        }
    }
}
