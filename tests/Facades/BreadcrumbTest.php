<?php

namespace Mateusjatenee\Breadcrumb\Tests\Facades;

use Mateusjatenee\Breadcrumb\Breadcrumb;
use Mateusjatenee\Breadcrumb\Facades\Breadcrumb as Facade;
use Mateusjatenee\Breadcrumb\Tests\TestCase;

class BreadcumbTest extends TestCase
{

    /** @test */
    public function it_returns_the_correct_class()
    {
        $this->assertInstanceOf(Breadcrumb::class, Facade::getFacadeRoot());
    }
}
