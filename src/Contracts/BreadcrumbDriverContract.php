<?php

namespace Mateusjatenee\Breadcrumb\Contracts;

interface BreadcrumbDriverContract
{
    public function generate();

    public function getParentTags();

    public function getItemTags();

    public function getLastItemTags();
}
