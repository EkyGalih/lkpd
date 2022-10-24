<?php

namespace App\Http\Middleware;

use App\Helper\UserAccess;
use Closure;
use Illuminate\Support\Facades\Auth;

class isPimpinan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check())
        {
            if (UserAccess::getRole() == 'pimpinan')
            {
                return $next($request);
            }
        }

        return redirect()->route('not_found');
    }
}
