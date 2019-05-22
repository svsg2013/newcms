<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        /*if (Auth::guard($guard)->check()) {
            $locale = \App::getLocale();
            return redirect('/'.$locale.'/admin');
        }*/

        switch ($guard) {
            case 'admin':
                if (Auth::guard($guard)->check()) {
                    $locale = \App::getLocale();
                    return redirect('/'.$locale.'/admin');
                }
            break;

            case 'e-link':
                if (Auth::guard($guard)->check()) {
                    return redirect('/e-link'); 
                }
            break;

            return redirect('/');
        }

        return $next($request);
    }
}
