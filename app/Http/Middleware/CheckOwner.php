<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckOwner
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     * @throws AuthorizationException
     */
    public function handle(Request $request, Closure $next, $modelClass): Response
    {
        $object = $request->route($modelClass);

        if (!$object || !$object?->isOwner()) {
            throw new AuthorizationException('Access denied');
        }

        return $next($request);
    }
}
