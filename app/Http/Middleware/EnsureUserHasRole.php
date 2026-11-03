<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $user = $request->user();

        if (! $user) {
            abort(403, 'Akses ditolak: Pengguna tidak terautentikasi.');
        }

        // Parse role values
        $allowedRoles = array_map(fn ($role) => UserRole::from($role), $roles);

        // Check if user has one of the allowed roles
        if (! in_array($user->role, $allowedRoles, true)) {
            abort(403, 'Akses ditolak: Anda tidak memiliki izin untuk mengakses halaman ini.');
        }

        return $next($request);
    }
}
