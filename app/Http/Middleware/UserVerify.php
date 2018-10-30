<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class UserVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = User::where('email', $request->email)->first();
        if(!$user->verified)
        {
            session()->flash('warning', 'Account not verified');
            return redirect('/login');
        }
        return $next($request);
    }
}
