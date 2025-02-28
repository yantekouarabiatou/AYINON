<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();
        Log::info('AdminMiddleware check', [
            'user_id' => $user?->id,
            'role' => $user?->role?->name,
            'has_role_relation' => isset($user->role)
        ]);

        if (!$user || !$user->role || $user->role->name !== 'Administrateur') {
            abort(403, 'Accès interdit');
        }
        return $next($request);
    }
}
