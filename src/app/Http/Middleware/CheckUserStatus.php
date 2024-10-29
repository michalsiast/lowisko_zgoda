<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Sprawdzenie, czy użytkownik jest aktywny i niezablokowany
            if (!$user->is_active || $user->is_blocked) {
                Auth::logout();

                // Przekierowanie z komunikatem, jeśli użytkownik jest zablokowany
                return redirect()->route('index')->with('status', 'Twoje konto zostało zablokowane lub wymaga aktywacji.');
            }
        }

        return $next($request);
    }
}
