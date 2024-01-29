<?php

use function Laravel\Folio\name;

name('contact');

?>

<x-web::layout>
    <div class="min-h-92-screen bg-base-100">
        <div class="container mx-auto px-8 sm:px-4">
            <div class="mt-10">
    
            </div>
            <x-web::breadcrumb>
                <x-web::breadcrumb.home />
                <x-web::breadcrumb.contact active />
            </x-web::breadcrumb>
            <div class="flex flex-col lg:flex-row items-center">

                <div class="hidden lg:block">
                    <h1 class="text-5xl font-bold">
                        {{ __('Contact') }}
                    </h1>
                    <p class="py-6">{{ __('Create a regular contact form it was to bored, so i made something better:') }}</p>
                    
                </div>
                <livewire:web.contact />
            </div>
    
        </div>
    </div>
</x-web::layout>