<section {{ $attributes->merge(['class' => 'hero min-h-screen bg-base-200']) }}>
    <div class="hero-content flex-col h-full container mx-auto">
        <h2 class="text-4xl font-bold text-center">
            {{ __("Here's what i'm good at") }}
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 w-full sm:mt-4 md:mt-8 lg:mt-16">
            <div class="border border-neutral-content px-3 py-6 flex flex-col items-center shadow-md hover:border-secondary">
                <x-web::avatar>
                    <div class="rounded-full ring ring-neutral-content hover:ring-secondary ring-offset-base-200 ring-offset-2 p-3">
                        <x-heroicon-o-flag class="w-16 h-16 sm:w-20 sm:h-20 lg:w-24 lg:h-24 text-secondary" />
                    </div>
                </x-web::avatar>
                <h3 class="text-xl font-bold text-center mt-6 text-secondary">
                    {{ __('Team leadership') }}
                </h3>
                <p class="pt-8 px-8 text-center">
                    {{ __("Do you need help with a team of developers? i'm your guy.") }}
                </p>
            </div>
            <div class="border border-neutral-content px-3 py-6 flex flex-col items-center shadow-md hover:border-secondary">
                <x-web::avatar>
                    <div class="rounded-full ring ring-neutral-content hover:ring-secondary ring-offset-base-200 ring-offset-2 p-3">
                        <x-heroicon-o-code-bracket-square class="w-16 h-16 sm:w-20 sm:h-20 lg:w-24 lg:h-24 text-secondary" />
                    </div>
                </x-web::avatar>
                <h3 class="text-xl font-bold text-center mt-6 text-secondary">
                    {{ __('Full stack development') }}
                </h3>
                <p class="pt-8 px-8 text-center">
                    {{ __('Writting apps using the') }} <x-web::link href="https://tallstack.dev/" external class="link-info">TALL Stack</x-web::link>  {{ __('thinking in future and innovation.') }}
                </p>
            </div>
            
            <div class="border border-neutral-content px-3 py-6 flex flex-col items-center shadow-md hover:border-secondary">
                <x-web::avatar>
                    <div class="rounded-full ring ring-neutral-content hover:ring-secondary ring-offset-base-200 ring-offset-2 p-3">
                        <x-heroicon-o-shopping-cart class="w-16 h-16 sm:w-20 sm:h-20 lg:w-24 lg:h-24 text-secondary" />
                    </div>
                </x-web::avatar>
                <h3 class="text-xl font-bold text-center mt-6 text-secondary">
                    {{ __('E-Commerce development') }}
                </h3>
                <p class="pt-8 px-8 text-center">
                    {{ __('I have been working in projects related with selling products.') }}
                </p>
            </div>
            <div class="border border-neutral-content px-3 py-6 flex flex-col items-center shadow-md hover:border-secondary">
                <x-web::avatar>
                    <div class="rounded-full ring ring-neutral-content hover:ring-secondary ring-offset-base-200 ring-offset-2 p-3">
                        <x-heroicon-o-gift-top class="w-16 h-16 sm:w-20 sm:h-20 lg:w-24 lg:h-24 text-secondary" />
                    </div>
                </x-web::avatar>
                <h3 class="text-xl font-bold text-center mt-6 text-secondary">
                    {{ __('Package development') }}
                </h3>
                <p class="pt-8 px-8 text-center">
                    {{ __('I have been working creating reusable code distributed by') }} <x-web::link class="link-info" external href="https://getcomposer.org/">Composer</x-web::link>.
                </p>
            </div>
            
        
        </div>
    </div>
</section>