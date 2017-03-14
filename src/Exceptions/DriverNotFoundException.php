<?php

namespace Mateusjatenee\Breadcrumb\Exceptions;

use Exception;

class DriverNotFoundException extends Exception
{
    public function __construct($driver)
    {
        parent::__construct('The driver ' . $driver . ' is not registered or does not exist.');
    }

}
