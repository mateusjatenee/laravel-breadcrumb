<?php

namespace Mateusjatenee\Breadcrumb\Tests\Fakes;

use Mateusjatenee\Breadcrumb\Contracts\BreadcrumbDriverContract;

class FakeDriver implements BreadcrumbDriverContract
{
    public function generate()
    {
        return 'foo';
    }

    public function getParentTags()
    {
        return '<ol class="breadcrumb">{content}</ol>';
    }

    public function getItemTags()
    {
        return '<li><span>{item}</span></li>';
    }

    public function getLastItemTags()
    {
        return '<li class="active"><span>{item}</span></li>';
    }
}
