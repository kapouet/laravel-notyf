<?php

namespace Kapouet\Notyf;

use Illuminate\Support\ServiceProvider;

class NotyfServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/notyf.php', 'kapouet.notyf');
        $this->app->singleton('notyf', Notyf::class);
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/notyf.php' => config_path('kapouet/notyf.php'),
            ], 'kapouet:config');
        }

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'notyf');
        $this->loadRoutesFrom(__DIR__ . '/../routes/routes.php');
    }
}
