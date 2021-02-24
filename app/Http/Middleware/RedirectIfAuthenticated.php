<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if(Auth::user()->role == 'admin')
                {
                    return redirect('admin');
                }

                if(Auth::user()->role == 'student')
                {
                    return redirect('student');
                }

                if(Auth::user()->role == 'dentist')
                {
                    return redirect('dentist');
                }

                if(Auth::user()->role == 'clerk')
                {
                    return redirect('clerk');
                }

                if(Auth::user()->role == 'technician')
                {
                    return redirect('technician');
                }
            }

        }

        return $next($request);
    }
}
