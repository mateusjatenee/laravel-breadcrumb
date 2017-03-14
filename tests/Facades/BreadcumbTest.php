<?php

namespace Mateusjatenee\Breadcumb\Tests\Facades;

use Mateusjatenee\Breadcumb\BreadcumbGenerator;
use Mateusjatenee\Breadcumb\Facades\Breadcumb;
use Mateusjatenee\Breadcumb\Tests\TestCase;

class BreadcumbTest extends TestCase
{

    /** @test */
    public function it_returns_the_correct_class()
    {
        $this->assertInstanceOf(BreadcumbGenerator::class, Breadcumb::getFacadeRoot());
    }
}
