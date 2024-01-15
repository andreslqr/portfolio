@props([

])

<div {{ $attributes->merge(['class' => 'dropdown']) }}>
    <div {{ $trigger->attributes->merge(['class' => 'btn m-2', 'tabindex' => '0', 'role' => 'button']) }}>
        {{ $trigger }}
    </div>
    <ul {{ $content->attributes->merge(['class' => 'p-2 shadow menu dropdown-content z-[1] bg-base-100 rounded-box w-52', 'tabindex' => '0']) }}>
        {{ $content }}
    </ul>
</div>
  