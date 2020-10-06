<?php

namespace App\Providers;

use App\Components\ApiCheckInnInterface;
use App\Components\ApiFns;
use App\Repositories\InnRepository;
use App\Repositories\InnRepositoryInterface;
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
        $this->app->singleton(ApiCheckInnInterface::class, function () {
            return new ApiFns();
        });

        $this->app->singleton(InnRepositoryInterface::class, function () {
            return new InnRepository();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
