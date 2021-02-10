<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $team)
    {
        if (!($request->user()->currentTeam->name == $team)) {
            
            return redirect('dashboard');
        }
        return $next($request);
    }
}
