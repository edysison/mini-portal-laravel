<?php

namespace App\Http\Middleware;

use Closure;

class IsEditor
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
        if(auth()->check() && $request->user()->role == 'editor' && $request->user()->active == 1){
            return $next($request);            
        }else{
            return redirect('/');
        }
    }
}
