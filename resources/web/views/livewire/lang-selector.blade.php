<x-web::dropdown class="dropdown-end">
    <x-slot:trigger class="btn-ghost">
        <x-icon :name="$langs[app()->getLocale()]['icon']" class="h-4 w-4" />
    </x-slot:trigger>
    <x-slot:content>
        @foreach ($langs as $key => $lang)
            <x-web::menu.item @click="$wire.set('lang', '{{ $key }}')">
                <x-icon :name="$lang['icon']" class="h-4 w-4" />
                {{ $lang['name'] }}
            </x-web::menu.item>
        @endforeach
    </x-slot:content>

</x-web::dropdown>
