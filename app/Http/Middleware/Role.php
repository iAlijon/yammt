<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Role extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, \Closure $next, ... $roles)
    {
        if (!Auth::check())
            return redirect('login');

        $user = Auth::user();

        if ($user->hasRole('administrator'))
            return $next($request);

        foreach ($roles as $role)
        {
            if ($user->hasRole($role))
                return  $next($request);
        }

        return redirect('login');
    }
}
