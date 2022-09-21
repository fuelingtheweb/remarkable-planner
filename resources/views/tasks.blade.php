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

        <div class="flex flex-col gap-4 m-8 ml-20">
            @foreach ($tasks as $task)
                <div class="flex items-end">
                    <div class="w-8 h-8 border border-gray-400"></div>

                    <div class="flex-1 pl-4 ml-4 border-b border-gray-400">
                        {{ $task }}
                    </div>
                </div>
            @endforeach
        </div>
    </x-viewport>
</body>
</html>
