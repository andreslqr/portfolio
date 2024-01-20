<?php

use function Laravel\Folio\name;

name('blog.index');

?>

<x-web::layout class="bg-base-200">
    <div class="container mx-auto px-4">
        <div class="mt-10">

        </div>
        <x-web::breadcrumb>
            <x-web::breadcrumb.home />
            <x-web::breadcrumb.blog active />
        </x-web::breadcrumb>
        <div class="mt-20">
            <livewire:web.list-posts>
        </div>

    </div>
</x-web::layout>