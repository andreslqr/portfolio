<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class ConfigureLang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $lang = $request->session()->get('lang', fn() => 
            $this->parseHttpLocale($request->header('Accept-Language', config('app.locale'))));
            
        app()->setLocale($lang);

        return $next($request);
    }

    /**
     * Get the preffered lang
     * 
     * @param  string $langs
     * @return string
     */
    private function parseHttpLocale(string $langs): string
    {
        $locales = Str::of($langs)
            ->explode(',')
            ->map(function ($locale) {
                $parts = explode(';', $locale);

                $mapping['locale'] = trim($parts[0]);

                if (isset($parts[1])) {
                    $factorParts = explode('=', $parts[1]);

                    $mapping['factor'] = $factorParts[1];
                } else {
                    $mapping['factor'] = 1;
                }

                return $mapping;
            })
            ->sortByDesc(function ($locale) {
                return $locale['factor'];
            });


        return $locales->firstWhere(fn($lang) => in_array($lang['locale'], array_keys(config('langs.available-langs'))))['locale'] 
            ?? Arr::first(array_keys(config('langs.available-langs')));
    }
}
