<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            // User is authenticated, allow them to access the route
            return $next($request);
        }

        // User is not authenticated, redirect to the login page
        return redirect()->route('client.page.signin')->with('fail', 'Please login to access this page');
    }
}
