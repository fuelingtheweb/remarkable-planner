@if (request()->hasHeader('X-Printing-Pdf'))
    <div class="mx-auto break-before-page">
        {{ $slot }}
    </div>
@else
    <div class="w-[596px] h-[795px] overflow-hidden border border-black mx-auto my-4 break-before-page">
        <div class="h-full border-l border-black">
            {{ $slot }}
        </div>
    </div>
@endif
