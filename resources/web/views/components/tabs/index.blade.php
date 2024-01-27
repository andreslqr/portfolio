@props([
    'boxed' => false
])

<div {{ $attributes->merge(['class' => 'tabs'])->class(['tabs-boxed' => $boxed]) }}>
    {{ $slot }}
</div>