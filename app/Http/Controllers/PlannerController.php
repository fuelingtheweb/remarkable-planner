<?php

namespace App\Http\Controllers;

use App\Support\Calendar;
use Carbon\Carbon;
use Symfony\Component\Yaml\Yaml;

class PlannerController extends Controller
{
    public function all()
    {
        return view('all', [
            'calendar' => Calendar::buildAll(),
        ]);
    }

    public function tasks()
    {
        return view('tasks', [
            'tasks' => Yaml::parse(file_get_contents(storage_path('tasks.yml'))),
        ]);
    }

    public function year($year = null)
    {
        return view('year', [
            'calendar' => Calendar::buildYear($year ??= now()->year)
        ]);
    }

    public function day($year, $month, $day)
    {
        $yaml = Yaml::parse(file_get_contents(storage_path('calendar.yml')));

        return view('day', [
            'calendar' => Calendar::buildMonth($year, $month, $day),
            'pages' => Calendar::pagesForDate($yaml, Carbon::create($year, $month, $day)),
        ]);
    }
}
