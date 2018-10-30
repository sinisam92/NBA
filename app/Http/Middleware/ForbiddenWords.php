<?php

namespace App\Http\Middleware;

use Closure;

class ForbiddenWords
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
        $words = ['hate', 'idiot',  'stupid'];
        foreach($words as $word)
        {
           if(preg_match("/\b$word\b/i", $request)){
               return response(view('comments.forbidden-comment'));
           } 
        }
        return $next($request);
    }
}
