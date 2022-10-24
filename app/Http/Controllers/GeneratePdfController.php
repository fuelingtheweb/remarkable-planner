<?php

namespace App\Http\Controllers;

use App\Jobs\GeneratePdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GeneratePdfController extends Controller
{
    public function __invoke(Request $request)
    {
        GeneratePdf::dispatch();

        return Storage::download('planner.pdf');
    }
}
