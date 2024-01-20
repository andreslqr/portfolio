<?php

use function Laravel\Folio\name;

name('blog.index');

?>

<x-web::layout class="bg-base-100">
    <div class="container mx-auto px-8 sm:px-4 min-h-screen">
        <div class="mt-10">

        </div>
        <x-web::breadcrumb>
            <x-web::breadcrumb.home />
            <x-web::breadcrumb.blog active />
        </x-web::breadcrumb>
        <div class="mt-10">
            <livewire:web.list-posts>
        </div>

    </div>
</x-web::layout>