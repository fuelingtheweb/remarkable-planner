<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Planner</title>

    @vite(['resources/css/app.css'])
</head>
<body>
    <x-year :calendar="$year" />

    <x-day :calendar="$month" :tasks="$tasks" />
</body>
</html>