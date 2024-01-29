<?php

namespace App\Providers;

use App\Models\Blog\Post;
use App\Models\Scopes\IsPublishedScope;
use App\Models\Scopes\LangScope;
use Illuminate\Support\ServiceProvider;
use Spatie\LaravelSettings\Models\SettingsProperty;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        SettingsProperty::addGlobalScope(LangScope::make());
        Post::addGlobalScope(IsPublishedScope::make());
    }
}
