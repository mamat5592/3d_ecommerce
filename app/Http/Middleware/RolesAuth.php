<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RolesAuth
{
    public function handle(Request $request, Closure $next)
    {
        $roles = auth()->user()->roles()->get();
        $rwhp = $roles->first(); // role with highest priority

        foreach ($roles as $role) {
            if ($role->priority > $rwhp->priority) {
                $rwhp = $role;
            }
        }

        $permissions = $rwhp->permissions()->get();

        foreach ($permissions as $permission) {
            if ($request->route()->getName() == $permission->route) {
                return $next($request);
            }
        }

        return response('Unauthorized Action', 403);
    }
}
