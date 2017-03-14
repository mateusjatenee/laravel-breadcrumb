<?php

namespace Mateusjatenee\Breadcumb\Tests;

use Mateusjatenee\Breadcumb\Breadcumb;
use Mateusjatenee\Breadcumb\Tests\Fakes\FakeDriver;

class BreadcumbTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->breadcumb = $this->app->make('breadcumb');
    }

    /** @test */
    public function it_adds_drivers()
    {
        $this->breadcumb->addDriver('foo', FakeDriver::class);

        $this->assertEquals(1, $this->breadcumb->getDrivers()->count());
    }
}
