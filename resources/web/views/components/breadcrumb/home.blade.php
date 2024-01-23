@props([
    'active' => false
])
<x-web::breadcrumb.item :active="$active" :href="route('index')">
    <x-icon :name="$active ? 'heroicon-s-home' : 'heroicon-o-home'" class="h-4 w-4" /> 
    {{ __('Home') }}
</x-web::breadcrumb.item>