<?php

namespace App\Providers;

use App\Services\MailSender;
use App\Services\NotifierInterface;
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
        $this->app->bind(NotifierInterface::class, function (){
            return new MailSender();
        });
    }
}
