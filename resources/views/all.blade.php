<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Planner</title>

    @vite(['resources/css/app.css'])
</head>
<body>
    <x-year :year="$year" />

    @foreach ($year->months() as $month)
        @foreach ($month->days() as $day)
            @foreach ($day->pages() as $index => $page)
                <x-day :day="$day" :month="$month" :page="$page" :index="$index" />
            @endforeach
        @endforeach
    @endforeach
</body>
</html>
