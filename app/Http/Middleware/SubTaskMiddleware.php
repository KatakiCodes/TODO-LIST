<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SubTaskMiddleware
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
        $validateRequest = $request->validate(
            ['note'=>['required']],
            ['note.required'=>'A nota não pode ser vazia!']);
        return $next($request);
    }
}
