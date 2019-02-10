<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        setlocale(LC_ALL, [
            config('app.locale'),
            sprintf('%s_%s',
                config('app.locale'),
                strtoupper(config('app.locale'))
            ),
            sprintf('%s_%s.UTF-8',
                config('app.locale'),
                strtoupper(config('app.locale'))
            )
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
