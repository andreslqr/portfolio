@props([
])

<div {{ $attributes->merge(['class' => 'drawer', 'x-data' => 'drawer']) }}>
    <input type="checkbox" class="drawer-toggle" x-model="isOpen" />
    <div {{ $content->attributes->merge(['class' => 'drawer-content flex flex-col']) }}>
        {{ $content }}
    </div>
    <div {{ $side->attributes->merge(['class' => 'drawer-side']) }}>
        <x-web::drawer.close for="my-drawer" aria-label="close sidebar" class="drawer-overlay" />
        <ul class="menu p-4 w-80 min-h-full bg-base-200 text-base-content">
            {{ $side }}
        </ul>
    </div>
</div>
