<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OnlyAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->status_id != 2) {
            return redirect()->route("home");
        }
        return $next($request);
    }
}
