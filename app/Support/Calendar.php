<?php

namespace App\Support;

use Carbon\Carbon;
use Carbon\CarbonImmutable;

class Calendar
{
    public static function buildAll()
    {
        $year  = now()->year;

        return [
            'year' => $year,
            'months' => collect(range(1, 12))
                ->map(fn ($month) => static::buildMonth($year, $month)),
        ];
    }

    public static function buildYear($year)
    {
        return [
            'year' => $year,
            'months' => collect(range(1, 12))
                ->map(fn ($month) => static::buildMonth($year, $month)),
        ];
    }

    public static function buildMonth($year, $month, $day = null)
    {
        $selectedDate = CarbonImmutable::create($year, $month, $day ?? 1);
        $monthStart = $selectedDate->startOfMonth();
        $monthEnd = $selectedDate->endOfMonth();
        $start = $monthStart->startOfWeek(Carbon::SUNDAY);
        $end = $monthEnd->endOfWeek(Carbon::SATURDAY);

        return [
            'date' => $selectedDate,
            'year' => $selectedDate->year,
            'month' => $selectedDate->format('F'),
            'weeks' => collect($start->toPeriod($end)->toArray())
                ->map(fn ($date) => [
                    'path' => $date->format('/Y/m/d'),
                    'date' => $date,
                    'year' => $date->year,
                    'month' => $date->month,
                    'day' => $date->day,
                    'withinMonth' => $date->between($monthStart, $monthEnd),
                ])
                ->chunk(7),
            'days' => collect($monthStart->toPeriod($monthEnd)->toArray())
                ->map(fn ($date) => [
                    'path' => $date->format('/Y/m/d'),
                    'date' => $date,
                    'tasks' => str(file_get_contents(storage_path('tasks.yml')))->trim()->explode("\n"),
                ])
        ];
    }
}
