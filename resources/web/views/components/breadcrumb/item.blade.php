@props([
    'active' => false
])

<li>
    <a {{ $attributes->class(['link' => $active]) }}>
        {{ $slot }}
    </a>
</li>