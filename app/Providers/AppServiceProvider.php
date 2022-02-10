<?php

namespace App\Providers;

use App\DataProvider\SlideRepositoryInterface;
use App\Domain\Repository\SlideRepository;
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
        $this->app->bind(SlideRepositoryInterface::class,
        SlideRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
