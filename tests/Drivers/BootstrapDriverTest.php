<?php

namespace Mateusjatenee\Breadcrumb\Tests\Generators;

use Mateusjatenee\Breadcrumb\Facades\Breadcrumb;
use Mateusjatenee\Breadcrumb\Tests\TestCase;

class BootstrapDriverTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        app('breadcrumb')->setDriver('bootstrap');
    }
    /** @test */
    public function it_generates_the_correct_html()
    {
        $expected_html = <<<HTML
<ol class="breadcrumb"><li><span>Users</span></li><li><span>Library</span></li><li class="active"><span>New User</span></li></ol>
HTML;

        $generator = app('breadcrumb');

        $generator->set('users.library.new_user');

        $this->assertEquals($expected_html, $generator->generate());

        $expected_html = <<<HTML
<ol class="breadcrumb"><li class="active"><span>Users</span></li></ol>
HTML;

        $generator = app('breadcrumb');

        $generator->set('users');

        $this->assertEquals($expected_html, $generator->generate());
        $this->assertEquals($expected_html, Breadcrumb::generate());
    }
}
