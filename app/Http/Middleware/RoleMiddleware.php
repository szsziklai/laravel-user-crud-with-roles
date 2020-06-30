<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $permission = null) {
        if (!$request->user()) {
            flash(trans("validation.no_access"))->error();
            return redirect('/');
        }

        if (!$request->user()->hasRole($role)) {
            flash(trans("validation.no_access"))->error();
            return redirect()->back();
//            abort(404);
        }

        if ($permission !== null && !$request->user()->can($permission)) {
            flash(trans("validation.no_access"))->error();
            return redirect()->back();
//            abort(404);
        }

        return $next($request);
    }

}
