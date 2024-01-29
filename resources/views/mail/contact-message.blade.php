
<x-mail::layout>

{{-- Body --}}
# New contact

Hello, my name is {{ $name }},

I'm contacting you because:

{{ $message }}



Thanks,<br>
{{ config('app.name') }}


{{-- Footer --}}
<x-slot:footer>
<x-mail::footer>
© {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
</x-mail::footer>
</x-slot:footer>
</x-mail::layout>
