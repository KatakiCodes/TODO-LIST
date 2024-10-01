<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('createUserMiddleware')->only('store');
    }
    function create()
    {
        return view('sign-up');
    }

    function store(Request $request)
    {
        $user = [
           'email'=> $request->email,
           'name'=> $request->name,
           'password'=> bcrypt($request->password)
       ];
        $userCreated = User::create($user);
        Auth::login($userCreated);
            return redirect()->route('task.index');
    }
}
