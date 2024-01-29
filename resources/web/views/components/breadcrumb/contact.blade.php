@props([
    'active' => false
])
<x-web::breadcrumb.item :active="$active" :href="route('blog.index')">
    <x-icon :name="$active ? 'heroicon-s-envelope' : 'heroicon-o-envelope'" class="h-4 w-4" /> 
    {{ __('Contact') }}
</x-web::breadcrumb.item>