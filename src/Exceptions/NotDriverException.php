<?php

namespace Mateusjatenee\Breadcrumb\Exceptions;

use Exception;

class NotDriverException extends Exception
{
    public function __construct($class)
    {
        parent::__construct('The object ' . get_class($class) . ' does not implement the BreadcrumbDriverContract interface.');
    }

}
