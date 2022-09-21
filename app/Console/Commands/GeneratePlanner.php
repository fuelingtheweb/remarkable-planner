<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Browsershot\Browsershot;

class GeneratePlanner extends Command
{
    protected $signature = 'generate';

    protected $description = 'Generate planner for reMarkable';

    public function handle()
    {
        // reMarkable screen size: https://support.remarkable.com/hc/en-us/articles/360006699557
        // original tablet pixel size / table dpi * browser dpi
        // 1404 / 226 * 96
        // 1872 / 226 * 96

        Browsershot::url(url('/2022/02/22'))
            ->setExtraHttpHeaders(['X-Printing-Pdf' => 'true'])
            ->showBackground()
            ->paperSize(596, 795, 'px')
            ->save(storage_path('planner.pdf'));

        $this->info('Planner generated');
    }
}
