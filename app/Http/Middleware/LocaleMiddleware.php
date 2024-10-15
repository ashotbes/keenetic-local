<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class LocaleMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->segment(1);
        if (in_array($locale, ['en', 'fr', 'de'])) {
            App::setLocale($locale);
        } else {
            return redirect('/en');
        }

        return $next($request);
    }
}
