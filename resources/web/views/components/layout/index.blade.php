<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @livewireStyles
    @vite('resources/web/sass/app.scss')
</head>
<body>
    <x-web::layout.header />
    <main>
        {{ $slot }}
    </main>
    <x-web::layout.footer />
    @vite('resources/web/js/app.js')
    @livewireScriptConfig
</body>
</html>