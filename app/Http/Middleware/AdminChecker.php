<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
     $Role='';
      foreach (auth()->user()->roles as $role) {
        $Role=$role->role;
       }
       if (auth()->check() && $Role=='Admin') {
        return $next($request);
       }
       else {
        abort(403);
       }

    }
}
