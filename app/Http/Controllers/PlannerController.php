<?php

namespace App\Http\Controllers;

use App\Support\Day;
use App\Support\Month;
use App\Support\Year;
use Symfony\Component\Yaml\Yaml;

class PlannerController extends Controller
{
    public function all()
    {
        app('calendar')->useAnchors();

        return view('all', [
            'year' => new Year(now()->year),
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
            'year' => new Year($year ??= now()->year),
        ]);
    }

    public function day($year, $month, $day)
    {
        return view('day', [
            'day' => new Day($year, $month, $day),
            'month' => new Month($year, $month, $day),
        ]);
    }
}
