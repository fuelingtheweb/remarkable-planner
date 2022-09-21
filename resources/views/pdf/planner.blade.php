<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Planner</title>

    @css('css/app.css')
</head>
<body>
    <div class="p-4 text-4xl text-center bg-gray-100 dark:bg-gray-900">2022</div>

    <table class="w-full text-center">
        <thead>
            <tr>
                <th>Su</th>
                <th>Mo</th>
                <th>Tu</th>
                <th>We</th>
                <th>Th</th>
                <th>Fr</th>
                <th>Sa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($weeks as $days)
                <tr>
                    @foreach ($days as $date)
                        <td>
                            <div class="text-red-100">
                                {{ $date->day }}
                            </div>
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
