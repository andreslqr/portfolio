@props([
    'normalHeight' => false,
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data :data-theme="$store.theme.getName()">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @livewireStyles
    @vite('resources/web/sass/app.scss')
</head>

<body {{ $attributes }}>
    <x-web::drawer>
        <x-slot:side>
        </x-slot:side>
        <x-slot:content>
            <x-web::layout.header />
            <main>
                {{ $slot }}
            </main>
            <x-web::layout.footer />

        </x-slot:content>

    </x-web::drawer>
    @vite('resources/web/js/app.js')
    @livewireScriptConfig
</body>

</html>
