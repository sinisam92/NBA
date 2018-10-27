<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
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
        return redirect('/');
    }
    public function logout()
    {
        auth()->logout();

        return redirect('/login');
    }
}
