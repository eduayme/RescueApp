<?php

namespace App\Http\Middleware;

use App;
use Closure;
use Session;

class Locale
{
    protected $supported_languages = ['ca','es','en'];

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Session::has('locale')) {
            session(['locale' => $request->getPreferredLanguage($this->supported_languages)]);
        }

        App::setLocale(session('locale'));

        return $next($request);
    }
}
