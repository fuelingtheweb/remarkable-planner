@if (request()->hasHeader('X-Printing-Pdf'))
    <div class="mx-auto">
        <div class="ml-[52px]">
            {{ $slot }}
        </div>
    </div>
@else
    <div class="w-[596px] h-[795px] overflow-hidden border border-black mx-auto my-4">
        <div class="ml-[52px] h-full border-l border-black">
            {{ $slot }}
        </div>
    </div>
@endif
