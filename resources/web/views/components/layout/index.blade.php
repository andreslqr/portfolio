@props([
    'withoutFooter' => false
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data data-theme="dim" :data-theme="$store.theme.getName()">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ Vite::asset('resources/web/meta/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ Vite::asset('resources/web/meta/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ Vite::asset('resources/web/meta/' . app()->getLocale() . '-site.webmanifest') }}">
    <link rel="mask-icon" href="{{ Vite::asset('resources/web/meta/safari-pinned-tab.svg') }}" color="#2557e0">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="theme-color" content="#ffffff">

    {{ $meta ?? null }}
    @livewireStyles
    @vite('resources/web/sass/app.scss')
    @stack('styles')
</head>

<body>
    <x-web::drawer>
        <x-slot:side class="z-20">
            <x-web::layout.header.items />
        </x-slot:side>
        <x-slot:content class="scroll-smooth">
            <x-web::layout.header />
            <main {{ $attributes }}>
                {{ $slot }}
            </main>
            @unless ($withoutFooter)
                <x-web::layout.footer />
            @endunless

        </x-slot:content>

    </x-web::drawer>
    @vite('resources/web/js/app.js')
    @livewireScriptConfig
    @stack('scripts')
</body>

</html>
