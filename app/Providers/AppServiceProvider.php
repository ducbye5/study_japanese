<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Dusk\DuskServiceProvider;

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
            'App\Repositories\Interfaces\KatakanasRepositoryInterface',
            'App\Repositories\KatakanasRepository'
        );
        $this->app->bind(
            'App\Repositories\Interfaces\VocabulariesRepositoryInterface',
            'App\Repositories\VocabulariesRepository'
        );
        if ($this->app->environment('local', 'testing')) {
            $this->app->register(DuskServiceProvider::class);
        }
    }
}
