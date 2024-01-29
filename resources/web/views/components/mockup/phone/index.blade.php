@props([])

<div {{ $attributes->merge(['class' => 'mockup-phone']) }}>
    <div class="camera"></div>
    <div class="display">
        <div {{ $screen->attributes->merge(['class' => 'artboard']) }}>
            {{ $screen }}
        </div>
    </div>
</div>
