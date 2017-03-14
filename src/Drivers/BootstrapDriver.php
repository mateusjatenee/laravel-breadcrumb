<?php

namespace Mateusjatenee\Breadcrumb\Drivers;

use Mateusjatenee\Breadcrumb\BreadcrumbGenerator;
use Mateusjatenee\Breadcrumb\Contracts\BreadcrumbDriverContract;

class BootstrapDriver extends BreadcrumbGenerator implements BreadcrumbDriverContract
{
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
