<?php

namespace Mateusjatenee\Breadcrumb\Tests\Fakes;

use Mateusjatenee\Breadcrumb\Contracts\BreadcrumbDriverContract;

class FakeDriver implements BreadcrumbDriverContract
{
    public function generate()
    {
        return 'foo';
    }
}
