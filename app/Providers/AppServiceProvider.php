<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Blade::directive('css', function ($file) {
            return "<?php echo '<style>' . file_get_contents(public_path({$file})) . '</style>'; ?>";
        });
    }
}
