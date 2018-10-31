<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\VerifyUser;
use App\Mail\VerifyMail;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function create()
    {
        return view('register.create');
    }
    public function store()
    {
        $this->validate(
            request(),
            User::VALIDATION_RULES
        );

       
        $user = new User;
        $user->name = request('name');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));
        $user->save();

       
        $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token' => sha1(time())
          ]);
           
          Mail::to($user->email)->send(new VerifyMail($user));
        
        session()->flash('message', 'We sent you verification link, please check your mail!');
         //auth()->login($user);

        return redirect('/login');
    }
   
    public function verifyUser($token)
    {
        
        $verifyUser = VerifyUser::where('token', $token)->first();
        if(isset($verifyUser))
        {
            $user = $verifyUser->user;
            if(!$user->verified) {
            $verifyUser->user->verified = 1;
            $verifyUser->user->save();
            }
            session()->flash('message', 'You have  verified your email!');           
       
        
            return redirect('/login');
       
        }
      
    }
}
