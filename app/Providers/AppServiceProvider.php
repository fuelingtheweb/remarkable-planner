<?php

namespace App\Providers;

use App\Support\Calendar;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->singleton('calendar', fn () => new Calendar());
    }
}
