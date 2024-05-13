<?php

namespace Softliya\Paytr;

use GuzzleHttp\Client;
use Softliya\Paytr\PayTR;
use Illuminate\Support\ServiceProvider;
use Softliya\Paytr\Exceptions\InvalidConfigException;

class PayTRServiceProvider extends ServiceProvider
{
    public function boot()
    {
        
    }

    public function register()
    {
        $this->app->bind('PayTR', function($app) {
            return new PayTR();
        });
    }
}