<?php

namespace Mateusjatenee\Breadcumb;

use Illuminate\Support\ServiceProvider;
use Mateusjatenee\Breadcumb\Breadcumb;

class BreadcumbServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->singleton('breadcumb', function ($app) {
            return $app->make(Breadcumb::class);
        });

        $this->app->bind('breadcumbGenerator', function ($app) {
            return $app->make(BreadcumbGenerator::class);
        });
    }
}
