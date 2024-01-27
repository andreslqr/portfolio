<?php

use function Laravel\Folio\name;
use function Laravel\Folio\render;
use Illuminate\View\View;
use App\Settings\CVSettings;

name('online-cv');

render(fn (View $view, CVSettings $settings) => $view->with('profile', $settings));
?>

<x-web::layout class="bg-gradient-to-br from-base-100 to-primary h-92-screen overflow-auto relative" without-footer>
    <div class="container mx-auto px-8 sm:px-4 relative">
        <div class="mt-10">

        </div>
        <x-web::breadcrumb class="">
            <x-web::breadcrumb.home />
            <x-web::breadcrumb.online-cv active />
        </x-web::breadcrumb>
        <div class="relative">
            <div class="grid grid-cols-1 md:grid-cols-7 lg:grid-cols-12 gap-8 relative">
                <x-web::pages.online-cv.sections.general :$profile class="md:col-span-3 lg:col-span-4 mt-36 relative md:sticky top-36 h-fit" />
                <div class="md:col-span-4 lg:col-span-8 mt-32 md:mt-36 flex flex-col items-center lg:items-end gap-y-4" x-data="{ activeTab: 'about' }">

                    <x-web::card class="w-full lg:w-1/2 xl:w-3/5">
                        <x-slot:body class="grid grid-cols-3">
                            <label class="btn h-full py-4" :class="{'btn-primary': activeTab == 'about'}">
                                <div class="flex flex-col items-center">
                                    <x-heroicon-o-user-circle class="h-6 w-6" x-bind:class="{'hidden': activeTab == 'about', 'block': ! (activeTab == 'about')}" />
                                    <x-heroicon-s-user-circle class="h-6 w-6 hidden" x-bind:class="{'hidden': ! (activeTab == 'about'), 'block': activeTab == 'about'}" />
                                    <h3 class="text-lg">
                                        {{__('About')  }}
                                    </h3>
                                </div>
                                <input class="hidden" type="radio" value="about" name="tabs" x-model="activeTab" />
                            </label>
                            <label class="btn h-full py-4" :class="{'btn-primary': activeTab == 'works'}">
                                <div class="flex flex-col items-center">
                                    <x-heroicon-o-briefcase class="h-6 w-6" x-bind:class="{'hidden': activeTab == 'works', 'block': ! (activeTab == 'works')}" />
                                    <x-heroicon-s-briefcase class="h-6 w-6 hidden" x-bind:class="{'hidden': ! (activeTab == 'works'), 'block': activeTab == 'works'}" />
                                    <h3 class="text-lg">
                                        {{__('Works')  }}
                                    </h3>
                                </div>
                                <input class="hidden" type="radio" value="works" name="tabs" x-model="activeTab" />
                            </label>
                            <label class="btn h-full py-4" :class="{'btn-primary': activeTab == 'learning-career'}">
                                <div class="flex flex-col items-center">
                                    <x-heroicon-o-academic-cap class="h-6 w-6" x-bind:class="{'hidden': activeTab == 'learning-career', 'block': ! (activeTab == 'learning-career')}" />
                                    <x-heroicon-s-academic-cap class="h-6 w-6 hidden" x-bind:class="{'hidden': ! (activeTab == 'learning-career'), 'block': activeTab == 'learning-career'}" />
                                    <h3 class="text-lg">
                                        {{__('Learning')  }}
                                    </h3>
                                </div>
                                <input class="hidden" type="radio" value="learning-career" name="tabs" x-model="activeTab" />
                            </label>
                        </x-slot:body>
                    </x-web::card>
                    
                    
                    <x-web::card class="w-full">
                        <x-web::pages.online-cv.sections.about :$profile x-bind:class="{'hidden': ! (activeTab == 'about'), 'block': activeTab == 'about'}"  />
                        <x-web::pages.online-cv.sections.works :$profile x-bind:class="{'hidden': ! (activeTab == 'works'), 'block': activeTab == 'works'}" />
                        <x-web::pages.online-cv.sections.learning :$profile x-bind:class="{'hidden': ! (activeTab == 'learning-career'), 'block': activeTab == 'learning-career'}" />
                    </x-web::card>

                </div>
            </div>
        </div>

    </div>
</x-web::layout>