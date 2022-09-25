<?php

namespace App\Support;

use App\Support\Traits\InteractsWithCalendar;
use Carbon\CarbonImmutable;

class Day
{
    use InteractsWithCalendar;

    public $date;

    public function __construct($year, $month = null, $day = null)
    {
        $this->date = CarbonImmutable::create($year, $month ?? 1, $day ?? 1);
    }

    public function pages()
    {
        return collect(data_get($this->config(), 'days.' . strtolower($this->date->format('l'))) ?: [['template' => 'todo']])
            ->map(function ($page) {
                $template = data_get($page, 'template', 'todo');
                $lines = collect(data_get($page, 'lines', []));

                return [
                    'template' => $template,
                    'lines' => $template == 'blank'
                        ? []
                        : collect(range(1, 22))
                            ->map(fn ($index) => $lines->get($index - 1, ''))
                ];
            });
    }

    public function is($date)
    {
        return $date && $this->date->is($date);
    }

    public function isNotWithin($month)
    {
        return ! $this->within($month);
    }

    public function within($month)
    {
        return $this->date->month == $month->date->month;
    }

    public function yearPath()
    {
        return $this->path($this->date->year);
    }

    public function previousPath()
    {
        return $this->path($this->date->subDay());
    }

    public function nextPath()
    {
        return $this->path($this->date->addDay());
    }

    public function label()
    {
        return $this->date->day;
    }

    public function weekdayLabel()
    {
        return $this->date->format('l');
    }
}
