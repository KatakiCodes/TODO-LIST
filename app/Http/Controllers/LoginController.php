<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class LoginController extends Controller
{
    public function __construct() {
        $this->middleware('loginMiddleware')->only('auth');
    }
    public function login()
    {
        if(auth()->check())
            return redirect()->route('task.index');
        return view('log');
    }
    public function auth(Request $request)
    {
        $dataRequest = [
            'email'=> $request->email,
            'password'=> $request->password
        ];
        if(Auth::attempt($dataRequest,$request->remember))
        {
            $request->session()->regenerate();
            return redirect()->route('task.index');
        }
        else
            return redirect()->back()->with('error','utilizador não encontrado!');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
