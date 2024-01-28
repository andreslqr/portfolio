@props([
    'title',
    'active' => false
])
<x-web::breadcrumb.item :active="$active" :href="route('online-cv')">
    <x-icon :name="$active ? 'heroicon-s-identification' : 'heroicon-o-identification'" class="h-4 w-4" />
    {{ __('Online CV') }}
</x-web::breadcrumb.item>