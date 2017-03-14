<?php

namespace Mateusjatenee\Breadcumb;

use Illuminate\Support\ServiceProvider;

class BreadcumbServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->bind('breadcumbGenerator', function ($app) {
            return $app->make(BreadcumbGenerator::class);
        });
    }
}
