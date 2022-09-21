<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Planner</title>

    @vite(['resources/css/app.css'])
</head>
<body>
    <x-viewport>
        <div class="flex items-center justify-between px-1 pt-4">
            <div class="ml-8 text-center">
                <div class="text-lg tracking-widest uppercase">
                    {{ $calendar['date']->format('F') }}
                </div>

                <div class="flex items-center gap-0.5 text-7xl font-bold leading-[3.8rem]">
                    <a href="" class="text-gray-400">
                        <x-arrow-left />
                    </a>

                    <span>
                        {{ $calendar['date']->format('d') }}
                    </span>

                    <a href="" class="text-gray-400">
                        <x-arrow-right />
                    </a>
                </div>

                <div class="text-3xl tracking-widest uppercase">
                    {{ $calendar['date']->format('l') }}
                </div>
            </div>

            <div class="w-[180px]">
                <div class="flex items-center justify-center gap-0.5 text-sm">
                    <span>
                        {{ $calendar['date']->format('F Y') }}
                    </span>
                </div>

                <x-month :weeks="$calendar['weeks']" />
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
</body>
</html>
