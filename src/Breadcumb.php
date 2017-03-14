<?php

namespace Mateusjatenee\Breadcumb;

use Illuminate\Support\Collection;
use Mateusjatenee\Breadcumb\Contracts\BreadcumbDriverContract;
use Mateusjatenee\Breadcumb\Exceptions\NotDriverException;

class Breadcumb
{
    protected $drivers = [];

    public function __construct()
    {
        $this->drivers = new Collection([]);
    }

    public function addDriver(string $name, $breadcumb)
    {
        if (is_string($breadcumb)) {
            $breadcumb = app()->make($breadcumb);
        }

        $this->validateClass($breadcumb);

        $this->drivers[$name] = $breadcumb;

        return $this;
    }

    public function getDrivers()
    {
        return $this->drivers;
    }

    public function validateClass($breadcumb)
    {
        if (!$breadcumb instanceof BreadcumbDriverContract) {
            throw new NotDriverException($breadcumb);
        }
    }
}
