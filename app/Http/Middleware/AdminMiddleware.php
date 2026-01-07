<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            abort(403, 'Unauthorized. Admin access required.');
        }

        $user = Auth::user();

        if (!$user || $user->role !== 'admin') {
            abort(403, 'Unauthorized. Admin access required.');
        }

        return $next($request);
    }
}
