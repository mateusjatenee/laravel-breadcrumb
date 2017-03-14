<?php

namespace Mateusjatenee\Breadcumb\Tests;

use Mateusjatenee\Breadcumb\Breadcumb;
use Mateusjatenee\Breadcumb\Exceptions\NotDriverException;
use Mateusjatenee\Breadcumb\Tests\Fakes\FakeDriver;
use Mateusjatenee\Breadcumb\Tests\Fakes\FakeDriverWithNoInterface;

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
        $this->breadcumb->addDriver('bar', FakeDriver::class);

        $this->assertEquals(2, $this->breadcumb->getDrivers()->count());

        $this->assertEquals(new FakeDriver, $this->breadcumb->getDrivers()->first());
    }

    /** @test */
    public function it_throws_an_exception_if_driver_does_not_implement_the_contract()
    {
        $class = FakeDriverWithNoInterface::class;

        $this->expectException(NotDriverException::class);
        $this->expectExceptionMessage('The object ' . get_class(new $class) . ' does not implement the BreadcumbDriverContract interface.');

        $this->breadcumb->addDriver('foo', $class);
    }
}
