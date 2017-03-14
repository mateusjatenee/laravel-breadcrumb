<?php

namespace Mateusjatenee\Breadcrumb\Tests\Generators;

use Mateusjatenee\Breadcrumb\Tests\TestCase;

class CubeDashboardGeneratorTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        app('breadcrumb')->setDriver('cube');
    }
    /** @test */
    public function it_generates_the_correct_html()
    {
        $expected_html = <<<HTML
<ol class="breadcrumb"><li><span>Users</span></li><li class="active"><span>Show</span></li></ol>
HTML;

        $generator = app('breadcrumb');

        $generator->set('users.show');

        $this->assertEquals($generator->generate(), $expected_html);

        $expected_html = <<<HTML
<ol class="breadcrumb"><li class="active"><span>Users</span></li></ol>
HTML;

        $generator = app('breadcrumb');

        $generator->set('users');

        $this->assertEquals($generator->generate(), $expected_html);
    }
}
