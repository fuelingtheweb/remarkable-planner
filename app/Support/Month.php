<?php

namespace App\Support;

use App\Support\Traits\InteractsWithCalendar;
use Carbon\Carbon;
use Carbon\CarbonImmutable;

class Month
{
    use InteractsWithCalendar;

    public $date;
    public $day;

    public function __construct($year, $month = null, $day = null)
    {
        $this->day = $day;
        $this->date = CarbonImmutable::create($year, $month ?? 1, $day ?? 1);
    }

    public function weeks()
    {
        $weekStartsOn = constant(Carbon::class . '::' . strtoupper(data_get($this->config(), 'config.weekStartsOn', 'sunday')));

        $monthStart = $this->date->startOfMonth();
        $monthEnd = $this->date->endOfMonth();
        $start = $monthStart->startOfWeek($weekStartsOn);
        $end = $monthEnd->startOfWeek($weekStartsOn)->addDays(6)->endOfDay();

        return collect($start->toPeriod($end)->toArray())
            ->map(fn ($date) => new Day($date->year, $date->month, $date->day))
            ->chunk(7);
    }

    public function weekdays()
    {
        $weekStartsOn = constant(Carbon::class . '::' . strtoupper(data_get($this->config(), 'config.weekStartsOn', 'sunday')));

        $start = $this->date->startOfWeek($weekStartsOn);
        $end = $this->date->startOfWeek($weekStartsOn)->addDays(6)->endOfDay();

        return collect($start->toPeriod($end)->toArray())
            ->map(fn ($date) => str($date->format('D'))->limit(2, ''));
    }

    public function weekday($selectedDate, $index)
    {
        $weekStartsOn = constant(Carbon::class . '::' . strtoupper(data_get($this->config(), 'config.weekStartsOn', 'sunday')));

        return $selectedDate->startOfWeek($weekStartsOn)->addDays($index);
    }

    public function days()
    {
        $monthStart = $this->date->startOfMonth();
        $monthEnd = $this->date->endOfMonth();

        return $monthEnd->isPast() || $monthStart->isFuture()
            ? collect()
            : collect($monthStart->toPeriod($monthEnd)->toArray())
                ->map(fn ($date) => new Day($date->year, $date->month, $date->day));
    }

    public function weekdayPath($selectedDate, $index)
    {
        return $this->path($this->weekday($selectedDate, $index)->format('Y/m/d'));
    }

    public function label()
    {
        return $this->date->format('F');
    }

    public function fullLabel()
    {
        return $this->date->format('F Y');
    }
}
