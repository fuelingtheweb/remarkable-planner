@props(['calendar', 'date', 'tasks'])

<x-viewport>
    <div class="flex items-center justify-between px-1 pt-4">
        <div class="ml-2 w-[205px] text-center">
            <div class="text-lg tracking-widest uppercase">
                {{ $date->format('F') }}
            </div>

            <div class="flex items-center justify-center gap-0.5 text-7xl font-bold leading-[3.8rem]">
                <a href="" class="text-gray-400">
                    <x-arrow-left />
                </a>

                <span>
                    {{ $date->format('j') }}
                </span>

                <a href="" class="text-gray-400">
                    <x-arrow-right />
                </a>
            </div>

            <div class="text-3xl tracking-widest uppercase">
                {{ $date->format('l') }}
            </div>
        </div>

        <div class="w-[180px]">
            <a href="/" class="block text-sm text-center hover:bg-gray-300">
                <span>
                    {{ $date->format('F Y') }}
                </span>
            </a>

            <x-month :weeks="$calendar['weeks']" :date="$date" />
        </div>
    </div>

    <div class="flex flex-col gap-0.5 mt-1">
        @foreach ($tasks as $task)
            <div class="flex items-end">
                <div class="w-5 h-5 mx-2 border border-gray-400"></div>

                <div class="flex-1 pt-1 pl-2 leading-tight border-b border-gray-400">
                    {{ $task }}
                </div>
            </div>
        @endforeach
    </div>
</x-viewport>
