<?php

namespace Mateusjatenee\Breadcumb\Tests\Fakes;

class FakeDriverWithNoInterface
{
    public function generate()
    {
        return 'foo';
    }
}
