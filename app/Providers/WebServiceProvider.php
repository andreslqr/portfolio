<?php

namespace App\Providers;

use App\Http\Middleware\ConfigureLang;
use Illuminate\Support\ServiceProvider;
use Laravel\Folio\Folio;

class WebServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Folio::path(resource_path('web/views/pages'))->middleware([
            '*' => [
                ConfigureLang::class
            ],
        ]);

        $this->loadViewsFrom(resource_path('web/views'), 'web');
    }
}
