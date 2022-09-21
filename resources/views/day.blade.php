<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Planner</title>

    @vite(['resources/css/app.css'])
</head>
<body>
    @foreach ($pages as $page)
        <x-day :calendar="$calendar" :date="$calendar['date']" :template="$page['template']" :lines="$page['lines']" />
    @endforeach
</body>
</html>
