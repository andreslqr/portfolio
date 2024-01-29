@props([
    'profile'
])

<x-web::card :$attributes>
    <div class="flex justify-center mt-0 sm:-mt-36">
        <x-web::avatar>
            <div class="w-24 sm:w-36 lg:w-40 xl:w-48 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                <img src="{{ asset(Storage::url($profile->profilePicture)) }}" />
            </div>
        </x-web::avatar>
    </div>
    <h1 class="text-4xl font-bold text-center mt-6">
        {{ $profile->name }} {{ $profile->lastName }}
    </h1>
    <h3 class="text-lg font-extralight text-center mt-2">
        {{ $profile->role }}
    </h3>
    <div class="flex flex-wrap justify-center gap-4 px-0 sm:px-36 md:px-4 lg:px-0 mt-4">
        @foreach($profile->socialLinks as $link)
            <x-web::button as-link external href="{{ $link['url'] }}" class="aspect-square p-2 hover:btn-accent">
                <img src="{{ asset(Storage::url($link['logo'])) }}" alt="{{ __('image of :description', ['description' => $link['url']]) }}" />
            </x-web::button>
        @endforeach
    </div>
    
    <x-web::menu class="bg-base-200 rounded-box mt-6">
        @if($profile->numberContact)
            <x-web::menu.item external href="tel:{{ $profile->numberContact }}" class="group">
                <x-web::button outline class="w-12 btn-secondary btn-sm no-animation shadow-md shadow-secondary group-hover:btn-active">
                    <x-heroicon-s-device-phone-mobile class="h-4 w-4" />
                </x-web::button>
                <div class="flex flex-col">
                    <small class="text-small font-bold truncate">
                        {{__('Phone') }}
                    </small>
                    <span class="truncate">
                        {{ $profile->numberContact }}
                    </span>
                </div>
            </x-web::menu.item>
            <x-web::divider class="my-0" />
        @endif
        
        <x-web::menu.item external href="mailto:{{ $profile->emailContact }}" class="group">
            <x-web::button outline class="w-12 btn-primary btn-sm no-animation shadow-md shadow-primary group-hover:btn-active">
                <x-heroicon-s-inbox-arrow-down class="h-4 w-4" />
            </x-web::button>
            <div class="flex flex-col truncate">
                <small class="text-small font-bold">
                    {{__('Email') }}
                </small>
                <span class="truncate">
                    {{ $profile->emailContact }}
                </span>
            </div>
        </x-web::menu.item>
         
        <x-web::divider class="my-0"/>
        <x-web::menu.item external href="http://maps.google.com/maps?q=:{{ $profile->location }}" class="group">
            <x-web::button outline class="w-12 btn-accent btn-sm no-animation shadow-md shadow-accent group-hover:btn-active">
                <x-heroicon-s-map-pin class="h-4 w-4" />
            </x-web::button>
            <div class="flex flex-col truncate">
                <small class="text-small font-bold">
                    {{__('Location') }}
                </small>
                <span class="truncate">
                    {{ $profile->location }}
                </span>
            </div>
        </x-web::menu.item>
         
        @foreach ($profile->extraLinks as $link)
            <x-web::divider class="my-0"/>
            <x-web::menu.item external href="{{ $link['url'] }}" class="group">
                <x-web::button outline class="w-12 btn-info btn-sm no-animation shadow-md shadow-info group-hover:btn-active">
                    <img src="{{ asset(Storage::url($link['logo'])) }}" class="max-w-full max-h-full" alt="{{ __('image of :description', ['description' => $link['url']]) }}">
                </x-web::button>
                <div class="flex flex-col truncate">
                    <span class="truncate">
                        {{ str($link['url'])->match('/^(?:https?:\/\/)?(?:www\.)?([^\/]+)/') }}
                    </span>
                </div>
            </x-web::menu.item>
        @endforeach
             
    </x-web::menu> 
   
    <div class="mt-4 flex justify-center">
        <livewire:web.c-v-downloader />
    </div> 
</x-web::card>