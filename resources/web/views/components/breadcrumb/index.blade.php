@props([

])

<div {{ $attributes->merge(['class' => 'text-sm breadcrumbs']) }}>
    <ul>
        {{ $slot }}
    </ul>
</div>