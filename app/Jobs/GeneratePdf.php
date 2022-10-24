<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Spatie\Browsershot\Browsershot;

class GeneratePdf implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // reMarkable screen size: https://support.remarkable.com/hc/en-us/articles/360006699557
        // original tablet pixel size / table dpi * browser dpi
        // 1404 / 226 * 96
        // 1872 / 226 * 96

        Browsershot::url(url('/all'))
            ->setExtraHttpHeaders(['X-Printing-Pdf' => 'true'])
            ->showBackground()
            ->paperSize(596, 795, 'px')
            ->timeout(120)
            ->save(Storage::path('planner.pdf'));
    }
}
