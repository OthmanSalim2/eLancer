<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Route;
use Symfony\Component\HttpFoundation\Response;

class SetAppLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if ($user) {
            $locale = $user->language;
        } else {
            // here change the language by browser language
            // here accept-language this header recognized not custom
            // this represent the browser language
            $accept_language = $request->header('accept-language');
            $lang_array = explode(',', $accept_language);
            // getLocale() will take the from config
            $locale = $lang_array[0] ?? App::getLocale();

            // $locale = $request->query('lang', Session::get('lang', $locale));
            // Session::put('lang', $locale);

            // other way to rad the value for language from url
            // Here I read the locale parameter from request
            $locale = $request->route('locale', $locale);
        }

        App::setlocale($locale);

        // this the default value for locale parameter in url
        URL::defaults([
            'locale' => $locale,
        ]);

        Route::current()->forgetParameter('locale');

        return $next($request);
    }
}
