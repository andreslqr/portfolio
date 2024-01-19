@props([

])

<div {{ $attributes->merge(['class' => 'menu']) }}>
    {{ $slot }}
</div>