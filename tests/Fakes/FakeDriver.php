<?php

namespace Mateusjatenee\Breadcumb\Tests\Fakes;

use Mateusjatenee\Breadcumb\Contracts\BreadcumbDriverContract;

class FakeDriver implements BreadcumbDriverContract
{
    public function generate()
    {
        return 'foo';
    }
}
