<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->ajax()) {
            return $next($request);
        }
        if (Auth::check()) {
            // Get the authenticated user
            $user = Auth::user();

            // Check if the user has the role 'admin' or 'managers'
            if ($user->role === 'admin' || $user->role === 'managers') {
                // Allow access to the route
                return $next($request);
            }
        }
        return redirect('login')->with('fail', 'You must be logged in as an admin or manager to access this page!');
    }
}
