<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserSoftDeleteMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if ($request->user() && $request->user()->trashed()) {
            flash(trans("validation.disabled_user", ['attribute' => config('app.info_email')]))->error();
            Auth::logout();
            return redirect('/logout');
        }

        return $next($request);
    }

}
