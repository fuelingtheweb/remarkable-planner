@props(['day', 'month', 'page'])

<x-viewport>
    <a name="{{ $day->anchor() }}"></a>

    <div class="flex items-center justify-between px-1 pt-6">
        <div class="ml-2 w-[205px] text-center">
            <div class="text-lg tracking-widest uppercase">
                {{ $month->label() }}
            </div>

            <div class="flex items-center justify-center gap-0.5 text-7xl font-bold leading-[3.8rem]">
                <a href="{{ $day->previousPath() }}" class="text-gray-400">
                    <x-icons.arrow-left />
                </a>

                <span>
                    {{ $day->label() }}
                </span>

                <a href="{{ $day->nextPath() }}" class="text-gray-400">
                    <x-icons.arrow-right />
                </a>
            </div>

            <div class="text-3xl tracking-widest uppercase">
                {{ $day->weekdayLabel() }}
            </div>
        </div>

        <div class="w-[180px]">
            <a href="{{ $day->yearPath() }}" class="block text-sm text-center hover:bg-gray-300">
                <span>
                    {{ $month->fullLabel() }}
                </span>
            </a>

            <x-month :month="$month" :selectedDate="$day->date" />
        </div>
    </div>

    <div class="flex flex-col gap-0.5 mt-1">
        @foreach ($page['lines'] as $line)
            <div class="flex items-end">
                @if ($page['template'] == 'todos')
                    <div class="w-5 h-5 mx-2 border border-gray-400"></div>
                @endif

                <div class="flex-1 pt-1 pl-2 leading-tight border-b border-gray-400">
                    @if ($line)
                        {{ $line }}
                    @else
                        &nbsp;
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</x-viewport>
