<?php

namespace Mateusjatenee\Breadcumb\Tests\Fakes;

use Mateusjatenee\Breadcumb\Contracts\BreadcumbGeneratorContract;

class FakeDriver implements BreadcumbGeneratorContract
{
    public function generate()
    {
        return 'foo';
    }
}
