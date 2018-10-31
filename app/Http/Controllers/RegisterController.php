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

        //kreiramo novog usera zahtevamo name , email i hasovan password
        $user = new User;
        $user->name = request('name');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));
        $user->save();

        //kreiramo token na user id koji ce nam omoguciti verifikaciju emaila
        $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token' => sha1(time())
          ]);
          //saljemo verifikacioni kod useru 
          Mail::to($user->email)->send(new VerifyMail($user));
        //   return $user;
        session()->flash('message', 'We sent you verification link, please check your mail!');
         //auth()->login($user);

        return redirect('/login');
    }
   
    public function verifyUser($token)
    {
        //kada user klikne na verifikacioni link ovo se opaljuje i vrsi potrebne provere
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
