<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RolesAuth
{
    public function handle(Request $request, Closure $next)
    {
        $roles = auth()->user()->roles()->get();

        foreach ($roles as $role) {
            $permissions = $role->permissions()->get();

            foreach ($permissions as $permission) {
                if ($request->route()->getName() == $permission->route) {
                    return $next($request);
                }
            }
        }

        return response('Unauthorized Action', 403);
    }
}
