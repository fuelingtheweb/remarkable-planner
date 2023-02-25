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

    <form action="{{ route('generate-pdf') }}" method="post">
        @csrf
        <div class="flex justify-center">
            <button type="submit" class="px-5 py-3 text-white bg-black rounded-sm">Generate pdf</button>
        </div>
    </form>
@endif
