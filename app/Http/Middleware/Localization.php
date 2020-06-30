<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Session\Session;

class Localization {

    public function handle($request, Closure $next) {
        /** @var Session $session */
        $session = $request->getSession();

        if (!$session->has('locale')) {
            $session->put('locale', $request->getPreferredLanguage(config('app.languages')));
        }

        if ($request->has('lang')) {
            $lang = $request->get('lang');
            if (in_array($lang, config('app.languages'))) {
                $session->put('locale', $lang);
            }
        }

        app()->setLocale($session->get('locale'));

        return $next($request);
    }

}
