<?php

use function Laravel\Folio\name;
use function Laravel\Folio\render;
use Illuminate\View\View;
use App\Models\Blog\Post;

name('blog.show');

render(fn (View $view, $slug) => $view->with('post', Post::where('slug->' . app()->getLocale(), $slug)->firstOrFail()));

?>

<x-web::layout class="bg-gradient-to-b from-base-100 to-base-300">
    <div class="container mx-auto px-8 sm:px-4 min-h-screen">
        <div class="mt-10">

        </div>
        <x-web::breadcrumb>
            <x-web::breadcrumb.home />
            <x-web::breadcrumb.blog />
            <x-web::breadcrumb.post active :slug="$post->slug" :title="$post->title" />
        </x-web::breadcrumb>
        <div class="mt-10 max-w-4xl mx-auto">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold mb-8">
                {{ $post->getWebTitle() }}
            </h1>
            <p class="mt-4 text-sm mb-8">
                <span>{{ __('Published') }}</span> <span>{{ $post->getWebPublishedAt() }}</span> <span>{{ __('by') }}</span> <span>{{ $post->getWebAuthor() }}</span>
            </p>
            <img class="rounded-lg aspect-univision shadow-2xl" src="{{ $post->getWebImage() }}" alt="{{ __('image of :description', ['description' => $post->getWebTitle()]) }}">
            <div id="content" class="mt-10">
                {{ $post->getWebContent() }}
            </div>
        </div>  
    </div>
</x-web::layout>