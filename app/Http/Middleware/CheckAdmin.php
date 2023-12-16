<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class CheckAdmin
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->user();

        foreach ($roles as $role) {
            if ($user->roles()->where('name', $role)->exists()) {
                return $next($request);
            }
        }

        abort(403, 'Unauthorized');
    }
}
