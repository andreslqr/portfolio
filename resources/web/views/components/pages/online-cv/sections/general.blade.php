@props([
    'profile'
])

<x-web::card class="md:col-span-3 lg:col-span-3 mt-36 sticky top-28">
    <div class="flex justify-center mt-0 sm:-mt-36">
        <x-web::avatar>
            <div class="w-24 sm:w-36 lg:w-40 xl:w-48 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                <img src="{{ asset(Storage::url($profile->profilePicture)) }}" />
            </div>
        </x-web::avatar>
    </div>
    <h1 class="text-4xl font-bold text-center mt-4">
        {{ $profile->name }} {{ $profile->lastName }}
    </h1>
</x-web::card>