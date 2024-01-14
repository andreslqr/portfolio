<header class="navbar bg-base-100">
    <div class="navbar-start">
        <x-web::drawer.open class="btn btn-ghost lg:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
            </svg>
        </x-web::drawer.open>

        <a class="btn btn-ghost text-xl">
            {{ config('app.name') }}
        </a>
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1">
            <li><a>Item 1</a></li>
            <li>
                <details>
                    <summary>Parent</summary>
                    <ul class="p-2">
                        <li><a>Submenu 1</a></li>
                        <li><a>Submenu 2</a></li>
                    </ul>
                </details>
            </li>
            <li><a>Item 3</a></li>
        </ul>
    </div>
    <div class="navbar-end">
        <x-web::button>
        
        </x-web::button>
        <x-web::swap x-init="() => {
            if ($store.theme.darkMode())
                swap.on();
            $watch('isOn', value => value ? $store.theme.enableDarkMode() : $store.theme.disableDarkMode())
        }">

            <x-web::swap.on>
                <x-web::button>
                    <x-heroicon-o-moon class="h-8 w-8" />

                </x-web::button>
            </x-web::swap.on>
            <x-web::swap.off>
                <x-web::button>
                    <x-heroicon-o-sun class="h-8 w-8" />

                </x-web::button>
            </x-web::swap.off>

        </x-web::swap>
    </div>
</header>
