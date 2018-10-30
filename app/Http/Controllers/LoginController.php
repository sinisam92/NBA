<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
        $this->middleware('verify_users', ['only' => 'login']);
    }
    public function index()
    {
        return view('login.index');
    }
    public function login()
    {
        if(!auth()->attempt(request(['email', 'password']))){
            return back()->withErrors([
                'message' => 'Wrong email or password'
            ]);
        }
        // return redirect('/');
        // $this->guard()->logout();
        return redirect('/login')->with('message', 'We sent you an activation code. Check your email and click on the link to verify.');

    }
    public function logout()
    {
        auth()->logout();

        return redirect('/login');
    }
}
