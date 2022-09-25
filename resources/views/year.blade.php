<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $year->label() }}</title>

    @vite(['resources/css/app.css'])
</head>
<body>
    <x-year :year="$year" />
</body>
</html>
