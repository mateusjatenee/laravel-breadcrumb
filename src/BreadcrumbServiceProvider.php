<?php

namespace Mateusjatenee\Breadcrumb;

use Illuminate\Support\ServiceProvider;
use Mateusjatenee\Breadcrumb\Breadcrumb;
use Mateusjatenee\Breadcrumb\BreadcrumbGenerator;
use Mateusjatenee\Breadcrumb\Drivers\BootstrapDriver;
use Mateusjatenee\Breadcrumb\Drivers\CubeDashboardDriver;

class BreadcrumbServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->singleton('breadcrumb', function ($app) {
            return $app->make(Breadcrumb::class);
        });

        $this->app->bind('breadcrumbGenerator', function ($app) {
            return $app->make(BreadcrumbGenerator::class);
        });

        app('breadcrumb')
            ->addDriver('cube', CubeDashboardDriver::class)
            ->addDriver('bootstrap', BootstrapDriver::class)
            ->setDriver('bootstrap');
    }
}
