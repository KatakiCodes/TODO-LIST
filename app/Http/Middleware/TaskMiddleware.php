<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TaskMiddleware
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
        $ValidateRequest = $request->validate(
            ['title' => ['required']],
            ['title.required'=>'É obrigatório informar o nome da tarefa']
        );
        return $next($request);
    }
}
