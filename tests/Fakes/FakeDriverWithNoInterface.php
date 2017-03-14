<?php

namespace Mateusjatenee\Breadcrumb\Tests\Fakes;

class FakeDriverWithNoInterface
{
    public function generate()
    {
        return 'foo';
    }
}
