@props([
    'vertical' => false,
    'iconStart' => false,
    'compact' => false,
])


<ul {{ $attributes->merge(['class' => 'timeline'])->class(['timeline-vertical' => $vertical, 'timeline-snap-icon' => $iconStart, 'timeline-compact' => $compact]) }}>
    {{ $slot }}
</ul>