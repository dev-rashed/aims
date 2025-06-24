<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();

        ini_set('memory_limit', '-1');
        set_time_limit(0);

        if (config('app.debug')) {
            error_reporting(E_ALL & ~E_USER_DEPRECATED);
        } else {
            error_reporting(0);
        }

        // if (config('app.url') != request()->getSchemeAndHttpHost()) {
        //     $envKey = 'APP_URL'.'="'.env('APP_URL').'"';
        //     $envVal = 'APP_URL'.'="'.request()->getSchemeAndHttpHost().'"';

        //     $replaced = str_replace($envKey, $envVal, file_get_contents(base_path('.env')));
        //     file_put_contents(base_path('.env'), $replaced);
        // }
        //force https
        $url = parse_url(config('app.url'));
        if ($url['scheme'] == 'https') {
            URL::forceScheme('https');
        }

        // if (! file_exists(public_path('storage'))) {
        //     Artisan::call('storage:link', ['--force' => true]);
        //     Artisan::call('optimize:clear');
        // }

        Vite::macro('image', fn ($asset) => $this->asset("resources/images/{$asset}"));
    }
}
