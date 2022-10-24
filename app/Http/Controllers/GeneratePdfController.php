<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GeneratePdfController extends Controller
{
    public function __invoke(Request $request)
    {
        \Artisan::call('generate');

        return Storage::download('planner.pdf');
    }
}
