<x-web::mockup.code :language="$data['language']" class="rounded-md" :copy-data="$data['content']">
    @foreach (str($data['content'])->explode("\n") as $lineCode)
        
        <x-web::mockup.code.line :prefix="$loop->iteration">
            {{ str($lineCode)->replace("\t", "&emsp;&emsp;")->toHtmlString() }}
        </x-web::mockup.code.line>
    @endforeach
</x-web::mockup.code>
