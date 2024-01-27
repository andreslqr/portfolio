@props([

])

<div {{ $attributes->merge(['class' => 'card bg-base-100 shadow-xl']) }}>
    <div {{ isset($body) ? $body->attributes->merge(['class' => 'card-body']) : 'class=card-body' }}>
        {{ $body ??$slot }}
    </div>
</div>