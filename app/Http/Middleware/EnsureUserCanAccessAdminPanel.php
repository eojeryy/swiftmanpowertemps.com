<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserCanAccessAdminPanel
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! Auth::check()) {
            return redirect()->route('super-admin.sign-in');
        }

        if (! Auth::user()->canAccessAdminPanel()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()
                ->route('super-admin.sign-in')
                ->withErrors([
                    'email' => 'This account does not have admin panel access.',
                ]);
        }

        return $next($request);
    }
}
