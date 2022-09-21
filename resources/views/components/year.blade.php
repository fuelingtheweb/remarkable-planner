@props(['calendar'])

<x-viewport>
    <div class="p-4 mb-2 text-4xl text-center text-white bg-gray-900">
        {{ $calendar['year'] }}
    </div>

    <div class="grid grid-cols-3 px-2 pb-8 gap-x-2 gap-y-3">
        @foreach ($calendar['months'] as $month)
            <div>
                <div class="p-1 mb-1 text-xl text-center text-white bg-gray-800">
                    {{ $month['month'] }}
                </div>

                <x-month :weeks="$month['weeks']" />
            </div>
        @endforeach
    </div>
</x-viewport>
