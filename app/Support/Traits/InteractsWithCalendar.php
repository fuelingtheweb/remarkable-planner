<?php

namespace App\Support\Traits;

trait InteractsWithCalendar
{
    public function config()
    {
        return $this->calendar()->config;
    }

    public function path($date = null)
    {
        return $this->calendar()->path($this->anchor($date));
    }

    public function anchorWithIndex($date = null, $index = null)
    {
        return $this->anchor($date) . ($index > 0 ? "-{$index}" : '');
    }

    public function anchor($date = null)
    {
        return $this->calendar()->anchor($date ?? $this->date, $this->anchorFormat ?? null);
    }

    public function calendar()
    {
        return app('calendar');
    }
}
