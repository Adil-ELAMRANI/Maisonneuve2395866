<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next)
    {
        // Récupère la langue dans la session (par défaut 'fr')
        $locale = Session::get('locale', 'fr');
        App::setLocale($locale);

        return $next($request);
    }
}
