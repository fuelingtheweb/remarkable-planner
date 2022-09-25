<?php

namespace App\Support;

use App\Support\Traits\InteractsWithCalendar;
use Carbon\CarbonImmutable;

class Year
{
    use InteractsWithCalendar;

    public $date;
    public $anchorFormat = 'Y';

    public function __construct($year)
    {
        $this->date = CarbonImmutable::create($year);
    }

    public function months()
    {
        return collect(range(1, 12))
            ->map(fn ($month) => new Month($this->date->year, $month));
    }

    public function label()
    {
        return $this->date->year;
    }
}
