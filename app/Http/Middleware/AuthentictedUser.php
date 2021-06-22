<?php

namespace App\Http\Middleware;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Http\Request;

class AuthentictedUser extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('user.login');
        }
    }
}
/*

public function redirectTo($request)
    {
        // $guards = empty($guards) ? [null] : $guards;
        // if (! $request->expectsJson()) {
        //     foreach ($guards as $guard) {
        //         if($guard == 'web')
        //         return redirect()->route('user.login');
        //     }
        // }
        return redirect()->route('user.login');
    }
*/