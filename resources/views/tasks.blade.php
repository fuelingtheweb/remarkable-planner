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
        <div class="p-4 text-4xl text-center text-white bg-gray-900">
            Tasks
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
