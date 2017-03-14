<?php

namespace Mateusjatenee\Breadcumb\Tests\Generators;

use Mateusjatenee\Breadcumb\BreadcumbGenerator;
use Mateusjatenee\Breadcumb\Generators\CubeDashboardGenerator;
use Mateusjatenee\Breadcumb\Tests\TestCase;

class CubeDashboardGeneratorTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->app->bind(BreadcumbGenerator::class, function ($app) {
            return $app->make(CubeDashboardGenerator::class);
        });
    }
    /** @test */
    public function it_generates_the_correct_html()
    {
        $expected_html = <<<HTML
<ol class="breadcrumb"><li><span>Users</span></li><li class="active"><span>Show</span></li></ol>
HTML;

        $generator = app('breadcumbGenerator');

        $generator->set('users.show');

        $this->assertEquals($generator->generate(), $expected_html);

        $expected_html = <<<HTML
<ol class="breadcrumb"><li class="active"><span>Users</span></li></ol>
HTML;

        $generator = app('breadcumbGenerator');

        $generator->set('users');

        $this->assertEquals($generator->generate(), $expected_html);
    }
}
