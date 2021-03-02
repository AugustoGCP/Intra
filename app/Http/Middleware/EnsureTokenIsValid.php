<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureTokenIsValid
{
    public function handle(Request $request, Closure $next){
        
        if (empty(session('logged'))) {
            return redirect('/');
        }

        return $next($request);
    }
}
