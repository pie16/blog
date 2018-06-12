<?php

namespace App\Providers;

use App\Helpers\SendGmail;
use App\Helpers\SendMgw;
use Illuminate\Support\ServiceProvider;

class SendEmailServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('send', SendGmail::class);
    }
}
