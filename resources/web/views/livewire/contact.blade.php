
<x-web::mockup.phone class="border-primary mt-6 w-full sm:w-auto">
    <x-slot:screen class="bg-base-100 h-75-screen w-full sm:phone-1">
        <div class="h-full flex flex-col" x-data="contact" x-init="setWireId('{{ $this->getId() }}')">
            <div class="h-6 flex justify-between px-5 pt-1 bg-base-200" wire:ignore>
                <div class="text-sm" x-data="timer" x-text="currentTime">
                    10:07
                </div>
                <div class="flex gap-2">
                    <x-heroicon-s-chart-bar class="h-4 w-4" />
                    <x-heroicon-s-wifi class="h-4 w-4" />
                </div>
            </div>
            <div class="h-12 border-b flex items-center px-2 gap-2 bg-base-200 shadow border-base-300">
                <x-heroicon-s-chevron-left class="w-6 h-6 text-accent font-bold ml-2" />
                <x-web::avatar>
                    <div class="w-8 rounded-full">
                        <img src="{{ Vite::asset('resources/web/images/2.webp') }}" />
                    </div>
                </x-web::avatar>
                <div>

                    <h2 class="text-sm font-semibold leading-3">
                        {{__('Andres Lopez') }}
                    </h2>
                    <div class="text-xs leading-3">
                        {{__('Online') }}
                    </div>
                </div>
                <div class="ml-auto gap-4 mr-4 hidden sm:flex">
                    <x-heroicon-o-video-camera class="w-6 h-6 text-accent font-bold" />
                    <x-heroicon-o-phone class="w-6 h-6 text-accent font-bold" />
                </div>
            </div>
            <div class="h-full overflow-y-scroll">
                <template x-for="message in messages">
                    <div class="chat chat-start" :class="{'chat-start': message.left, 'chat-end': ! message.left}" x-init="$el.scrollIntoView({ behavior: 'smooth'})"  :key="message.content">
                        <div class="chat-bubble" :class="{'chat-bubble-secondary': !message.left, 'chat-bubble-error': message.error}" x-text="message.content">
                        </div>
                        <div class="chat-footer opacity-50" x-text="message.time">
                        </div>
                    </div>
                </template>
            </div>
            <div class="h-14 flex items-start bg-base-200 mt-auto px-3 gap-x-2 pt-1.5" wire:ignore>
                <input class="w-full input input-xs" x-model="message" @keydown.enter="reply" x-init="$el.focus()" />
                <x-web::button class="btn-xs btn-circle btn-accent" x-on:click="reply">
                    <x-heroicon-s-paper-airplane class="h-4 w-4 text-white" />
                </x-web::button>
            </div>

        </div>
    </x-slot:screen>
</x-web::mockup.phone>