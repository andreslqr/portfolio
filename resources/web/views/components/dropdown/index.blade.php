@props([

])

<div {{ $attributes->merge(['class' => 'dropdown', 'x-data' => 'dropdown']) }} :class="{'dropdown-open': isOpen }" @click.outside="close">
    <div @click="toggle" {{ $trigger->attributes->merge(['class' => 'btn', 'role' => 'button']) }}>
        {{ $trigger }}
    </div>
    <ul {{ $content->attributes->merge(['class' => 'p-2 shadow menu dropdown-content z-[1] bg-base-100 rounded-box w-52']) }}>
        {{ $content }}
    </ul>
</div>
  