<div {{$attributes->merge(['role' => 'button', 'class' => 'swap-on'])}} @click="on">
    {{ $slot }} 
</div>