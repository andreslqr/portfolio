<x-web::menu.item href="{{ route('index') }}" :active="request()->is('/')">
    <x-icon :name="request()->is('/') ? 'heroicon-s-home' : 'heroicon-o-home'" class="h-4 w-4 md:hidden" />
    {{ __('Home') }}
</x-web::menu.item>
<x-web::menu.item href="{{ route('blog.index') }}" :active="request()->is('blog*')">
    <x-icon :name="request()->is('blog*') ? 'heroicon-s-pencil-square' : 'heroicon-o-pencil-square'" class="h-4 w-4 md:hidden" />
    {{ __('Blog') }}
</x-web::menu.item>
<x-web::menu.item href="{{ route('online-cv') }}" :active="request()->is('online-cv')">
    <x-icon :name="request()->is('online-cv') ? 'heroicon-s-identification' : 'heroicon-o-identification'" class="h-4 w-4 md:hidden" />
    {{ __('Online CV') }}
</x-web::menu.item>
<x-web::menu.item href="{{ route('contact') }}" :active="request()->is('contact')">
    <x-icon :name="request()->is('contact') ? 'heroicon-s-envelope' : 'heroicon-o-envelope'" class="h-4 w-4 md:hidden" />
    {{ __('Contact') }}
</x-web::menu.item>