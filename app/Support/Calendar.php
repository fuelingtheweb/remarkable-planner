<?php

namespace App\Support;

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Symfony\Component\Yaml\Yaml;

class Calendar
{
    public $config;
    public $useAnchors = false;
    public $anchorFormat = 'Y/m/d';

    public function __construct()
    {
        $this->config = Yaml::parse(file_get_contents(storage_path('calendar.yml')));
    }

    public function useAnchors($useAnchors = true)
    {
        $this->useAnchors = $useAnchors;

        return $this;
    }

    public function path($anchor)
    {
        return request()->hasHeader('X-Printing-Pdf') || $this->useAnchors
            ? '#' . $anchor
            : '/' . $anchor;
    }

    public function anchor(Carbon|CarbonImmutable|string $date, $anchorFormat)
    {
        return is_string($date) ? $date : $date->format($anchorFormat ?? $this->anchorFormat);
    }
}
