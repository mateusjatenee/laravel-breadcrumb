<?php

namespace Mateusjatenee\Breadcrumb;

use Illuminate\Support\Collection;
use Mateusjatenee\Breadcrumb\Contracts\BreadcrumbDriverContract;
use Mateusjatenee\Breadcrumb\Exceptions\DriverNotFoundException;
use Mateusjatenee\Breadcrumb\Exceptions\NotDriverException;

class Breadcrumb
{
    protected $drivers = [];

    protected $currentDriver = null;

    public function __construct()
    {
        $this->drivers = new Collection([]);
    }

    public function __call($method, $args)
    {
        return $this->currentDriver()->$method(...$args);
    }

    public function addDriver(string $name, $breadcrumb)
    {
        if (is_string($breadcrumb)) {
            $breadcrumb = app()->make($breadcrumb);
        }

        $this->validateClass($breadcrumb);

        $this->drivers[$name] = $breadcrumb;

        return $this;
    }

    public function setDriver($name, $overwrite = true)
    {
        if ($this->currentDriver && !$overwrite) {
            return $this;
        }

        $this->currentDriver = $name;

        return $this;
    }

    public function getDrivers()
    {
        return $this->drivers;
    }

    public function flushDrivers()
    {
        $this->drivers = new Collection([]);

        return $this;
    }

    public function currentDriver()
    {
        if (!isset($this->drivers[$this->currentDriver])) {
            throw new DriverNotFoundException($this->currentDriver);
        }

        return $this->drivers[$this->currentDriver];
    }

    public function validateClass($breadcrumb)
    {
        if (!$breadcrumb instanceof BreadcrumbDriverContract) {
            throw new NotDriverException($breadcrumb);
        }
    }
}
