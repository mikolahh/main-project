<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $user = $request->user();
        if (!$user) {
            abort(403);
        }
        $allowedRoles = collect($roles)
            ->map(function (string $role) {
                $constant = UserRole::class . '::' . strtoupper($role);
                return defined($constant)
                    ? constant($constant)
                    : null;
            })
            ->filter();

        if ($allowedRoles->isEmpty()) {
            abort(403);
        }
        if (!$allowedRoles->contains($user->role)) {
            abort(403);
        }
        return $next($request);
    }
}