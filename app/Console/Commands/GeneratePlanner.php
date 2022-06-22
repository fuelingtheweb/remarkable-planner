<?php

namespace App\Console\Commands;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Console\Command;

class GeneratePlanner extends Command
{
    protected $signature = 'generate';

    protected $description = 'Generate planner for reMarkable';

    public function handle()
    {
        $pdf = Pdf::loadView('pdf.planner')->setPaper([0.0, 0.0, 445.0392, 592.4412]);

        $pdf->save(storage_path('planner.pdf'));

        $this->info('Planner generated');
    }
}
