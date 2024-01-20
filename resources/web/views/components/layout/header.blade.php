<header class="navbar bg-base-200 sticky top-0 z-10 backdrop-blur bg-opacity-50 h-8-screen">
    <div class="navbar-start">
        <x-web::drawer.open class="btn btn-ghost lg:hidden">
            <x-heroicon-o-bars-3-center-left class="h-6 w-6" />
        </x-web::drawer.open>

        <a href="{{ route('index') }}" class="btn btn-ghost text-xl sm:hidden">
            {{ __('Andres') }}
        </a>
        <a href="{{ route('index') }}" class="btn btn-ghost text-xl hidden sm:inline-flex">
            {{ __('Andres Portfolio') }}
        </a>
    </div>
    <div class="navbar-center hidden lg:flex">
        <x-web::menu class="menu-horizontal px-1">
            <x-web::layout.header.items />
        </x-web::menu>
    </div>
    <div class="navbar-end gap-2">
        <livewire:web.lang-selector />
        <x-web::swap x-init="() => {
            if ($store.theme.darkMode())
                on();
            $watch('isOn', value => value ? $store.theme.enableDarkMode() : $store.theme.disableDarkMode())
        }">

            <x-web::swap.on>
                <x-web::button class="btn-ghost">
                    <x-heroicon-o-moon class="h-4 w-4 md:h-6 md:w-6" />
                </x-web::button>
            </x-web::swap.on>
            <x-web::swap.off>
                <x-web::button class="btn-ghost">
                    <x-heroicon-o-sun class="h-4 w-4 md:h-6 md:w-6" />
                </x-web::button>
            </x-web::swap.off>

        </x-web::swap>
    </div>
</header>
