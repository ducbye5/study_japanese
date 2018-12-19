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
        \Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Interfaces\HiraganasRepositoryInterface',
            'App\Repositories\HiraganasRepository'
        );
        $this->app->bind(
            'App\Repositories\Interfaces\VocabulariesRepositoryInterface',
            'App\Repositories\VocabulariesRepository'
        );
    }
}
