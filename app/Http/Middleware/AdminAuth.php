<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->session()->get('admin_logged_in')) {
            return $next($request);
        }

        return redirect()->route('login-admin')->with('error', 'You must be logged in as Admin.');
    }
}