<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AutoLogout
{
    public function handle(Request $request, Closure $next)
    {
        $lastActivity = $request->session()->get('last_activity');

        if ($lastActivity && time() - $lastActivity > 10) {
            $request->session()->forget('last_activity');
            auth()->logout();
        }

        return $next($request);
    }
}
