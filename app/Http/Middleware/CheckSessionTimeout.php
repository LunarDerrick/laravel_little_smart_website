<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Log;

class CheckSessionTimeout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Retrieve the last activity time from session
            // if no last activity, assume now as of checking
            $lastActivityTime = $request->session()->get('lastActivityTime', time());

            // Calculate session timeout duration in seconds
            $sessionTimeout = config('session.lifetime') * 60;

            // Check if the session has timed out
            if (time() - $lastActivityTime > $sessionTimeout) {
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect()->route('login')->with('error', 'Your session has expired. Please log in again.');
            }

            // Update last activity time in session
            $request->session()->put('lastActivityTime', time());
        }

        // If not authenticated, redirect to login page
        return $next($request);
    }
}
