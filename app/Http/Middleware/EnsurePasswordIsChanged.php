<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsurePasswordIsChanged
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        // Exclude password change and logout routes
        $exemptRoutes = ['password.change.edit', 'password.change.update', 'logout'];

        if ($user && $user->must_change_password && ! $request->routeIs($exemptRoutes)) {
            return redirect()->route('password.change.edit')->with('warning', 'Anda harus mengganti kata sandi sebelum melanjutkan.');
        }

        return $next($request);
    }
}
