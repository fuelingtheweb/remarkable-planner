@props(['year'])

<x-viewport>
    <a name="{{ $year->anchor() }}"></a>

    <div class="p-2 mb-2 text-4xl text-center text-white bg-gray-900">
        {{ $year->label() }}
    </div>

    <div class="grid grid-cols-3 px-2 gap-x-2 gap-y-2">
        @foreach ($year->months() as $month)
            <div>
                <div class="p-0.5 mb-1 text-xl text-center text-white bg-gray-800">
                    {{ $month->label() }}
                </div>

                <x-month :month="$month" />
            </div>
        @endforeach
    </div>
</x-viewport>
