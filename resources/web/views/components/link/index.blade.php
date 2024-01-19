@props([
    'external' => false
])

<a {{ $attributes->merge(['class' => 'link', 'red' => $external ? 'noopener noreferrer' : false, 'target' => $external ? '_blank' : false]) }}>
    {{ $slot }}
</a>