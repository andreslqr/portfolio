<div {{ $attributes->merge(['class' => 'swap', 'x-data' => 'swap'])}}>
    <input type="checkbox" x-model="isOn" />
    {{ $slot }}
</div>