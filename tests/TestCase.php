<?php

namespace Mateusjatenee\Breadcumb\Tests;

use Mateusjatenee\Breadcumb\BreadcumbServiceProvider;
use Mateusjatenee\Breadcumb\Facades\Breadcumb;
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
            BreadcumbServiceProvider::class,
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
