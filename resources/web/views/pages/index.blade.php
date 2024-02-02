<?php

use function Laravel\Folio\name;
use function Laravel\Folio\render;
use Illuminate\View\View;
use App\Models\Blog\Post;

name('index');

render(
    fn(View $view) => $view->with(
        'latestPosts',
        Post::select('short_description')
            ->webQuery()
            ->limit(4)
            ->get(),
    ),
);

?>


<x-web::layout>
    <x-slot:meta>
        <title>
            {{ __('meta.home.title') }}
        </title>
        <meta name="description" content="{{ __('meta.home.description') }}">
        <meta name="keywords" content="{{ __('meta.home.keywords') }}">
        <meta property="og:title" content="{{ __('meta.home.og:title') }}" />
        <meta property=”og:description content="{{ __('meta.home.og:description') }}" />
        <meta property="og:image" content="{{ Vite::asset('resources/web/images/1.webp') }}" />
    </x-slot:meta>

    <x-web::pages.index.sections.landing />
    <x-web::pages.index.sections.about-me />
    <x-web::pages.index.sections.services />
    <x-web::pages.index.sections.blog :posts="$latestPosts" />
    <x-web::pages.index.sections.source-code />
</x-web::layout>
