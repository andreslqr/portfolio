<?php

use function Laravel\Folio\name;

name('blog.index');

?>

<x-web::layout class="bg-base-100">

    <x-slot:meta>
        <title>
            {{ __('meta.blog.title') }}
        </title>
        <meta name="description" content="{{ __('meta.blog.description') }}">
        <meta name="keywords" content="{{ __('meta.blog.keywords') }}">
        <meta property="og:title" content="{{ __('meta.blog.og:title') }}" />
        <meta property=”og:description content="{{ __('meta.blog.og:description') }}" />
        <meta property="og:image" content="{{ Vite::asset('resources/web/images/1.webp') }}" />
    </x-slot:meta>
    <div class="container mx-auto px-8 sm:px-4 min-h-screen">
        <div class="mt-10">

        </div>
        <x-web::breadcrumb>
            <x-web::breadcrumb.home />
            <x-web::breadcrumb.blog active />
        </x-web::breadcrumb>
        <div class="mt-10">
            <h1 class="text-5xl font-bold text-center mb-16">
                {{ __('Latest posts') }}
            </h1>
            <livewire:web.list-posts>
        </div>

    </div>
</x-web::layout>
