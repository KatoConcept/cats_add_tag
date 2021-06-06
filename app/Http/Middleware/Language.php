<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->cookie('lang') &&
            in_array($request->cookie('lang'), array_keys(config('app.available_locales')))){
            App::setLocale($request->cookie('lang'));
        } else {
            App::setLocale(config('app.locale'));
        }
        return $next($request)->withCookie(cookie()->forever('lang', App::getLocale()));
    }
}
