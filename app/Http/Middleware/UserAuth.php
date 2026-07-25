<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->session()->get('user_logged_in')) {
            return $next($request);
        }
        
        return redirect()->route('login-user')->with('error', 'You must be logged in as User.');
    }
}