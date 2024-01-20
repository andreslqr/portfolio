<?php

namespace App\Providers;

use App\Models\Blog\Post;
use App\Models\Scopes\IsPublishedScope;
use Illuminate\Support\ServiceProvider;

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
        Post::addGlobalScope(IsPublishedScope::make());
    }
}
