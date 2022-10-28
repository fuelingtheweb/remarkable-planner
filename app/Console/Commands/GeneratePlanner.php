<?php

namespace App\Console\Commands;

use App\Jobs\GeneratePdf;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Spatie\Browsershot\Browsershot;

class GeneratePlanner extends Command
{
    protected $signature = 'generate';

    protected $description = 'Generate planner for reMarkable';

    public function handle()
    {
        GeneratePdf::dispatch();

        $this->info('Planner generated');
    }
}
