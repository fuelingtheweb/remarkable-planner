<?php

namespace App\Http\Controllers;

use App\Support\Calendar;

class PlannerController extends Controller
{
    public function all()
    {
        return view('all', [
            'year' => Calendar::buildYear(now()->year),
            'month' => Calendar::buildMonth(2022, 2, 22),
            'tasks' => str(file_get_contents(storage_path('tasks.yml')))->trim()->explode("\n"),
        ]);
    }

    public function tasks()
    {
        return view('tasks', [
            'tasks' => str(file_get_contents(storage_path('tasks.yml')))->trim()->explode("\n"),
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
        return view('day', [
            'calendar' => Calendar::buildMonth($year, $month, $day),
            'tasks' => str(file_get_contents(storage_path('tasks.yml')))->trim()->explode("\n"),
        ]);
    }
}
