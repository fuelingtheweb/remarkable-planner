<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $calendar['year'] }}</title>

    @vite(['resources/css/app.css'])
</head>
<body>
    <x-viewport>
        <div class="p-4 mb-2 text-4xl text-center text-white bg-gray-900">
            {{ $calendar['year'] }}
        </div>

        <div class="grid grid-cols-3 px-2 pb-8 gap-x-2 gap-y-3">
            @foreach ($calendar['months'] as $month)
                <div>
                    <div class="p-1 mb-1 text-xl text-center text-white bg-gray-100 dark:bg-gray-800">
                        {{ $month['month'] }}
                    </div>

                    <x-month :weeks="$month['weeks']" />
                </div>
            @endforeach
        </div>
    </x-viewport>
</body>
</html>
