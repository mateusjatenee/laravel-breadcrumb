<?php

namespace Mateusjatenee\Breadcrumb\Tests;

use Mateusjatenee\Breadcrumb\Exceptions\NotDriverException;
use Mateusjatenee\Breadcrumb\Tests\Fakes\FakeDriver;
use Mateusjatenee\Breadcrumb\Tests\Fakes\FakeDriverWithNoInterface;

class BreadcumbTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->breadcrumb = $this->app->make('breadcrumb');
    }

    /** @test */
    public function it_adds_drivers()
    {
        $this->breadcrumb->flushDrivers();

        $this->breadcrumb->addDriver('foo', FakeDriver::class);
        $this->breadcrumb->addDriver('bar', FakeDriver::class);

        $this->assertEquals(2, $this->breadcrumb->getDrivers()->count());

        $this->assertEquals(new FakeDriver, $this->breadcrumb->getDrivers()->first());
    }

    /** @test */
    public function it_boots_with_default_drivers()
    {
        $this->assertEquals(2, $this->breadcrumb->getDrivers()->count());
        $this->assertEquals($this->breadcrumb->getDrivers()->last(), $this->breadcrumb->currentDriver());
    }

    /** @test */
    public function it_throws_an_exception_if_driver_does_not_implement_the_contract()
    {
        $class = FakeDriverWithNoInterface::class;

        $this->expectException(NotDriverException::class);
        $this->expectExceptionMessage('The object ' . get_class(new $class) . ' does not implement the BreadcrumbDriverContract interface.');

        $this->breadcrumb->addDriver('foo', $class);
    }
}
