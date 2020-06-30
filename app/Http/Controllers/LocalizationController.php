<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalizationController extends Controller {

    public function index($locale) {
        if (in_array($locale, config('app.languages'))) {
            session()->put('locale', $locale);
            app()->setLocale($locale);
        }
        return redirect()->back();
    }

}
