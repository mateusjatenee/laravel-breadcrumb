<?php

namespace Mateusjatenee\Breadcrumb\Tests;

use Mateusjatenee\Breadcrumb\BreadcrumbServiceProvider;
use Mateusjatenee\Breadcrumb\Facades\Breadcumb;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    public function setUp()
    {
        parent::setUp();
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            BreadcrumbServiceProvider::class,
        ];
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'Breadcumb' => Breadcumb::class,
        ];
    }
}
