<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * CheckRole
 *
 * The middleware that checks access to a part of the site with the role received as a parameter of the route.
 * @example : ... 'middleware' => ['auth', 'role:admin']] ...
 */
class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param string $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        if (!$request->user()->hasRole($role)) {
            return redirect()->route('home.index')->with('danger', 'Vous ne pouvez pas avoir accès à cette page');
        }
        return $next($request);
    }
}
