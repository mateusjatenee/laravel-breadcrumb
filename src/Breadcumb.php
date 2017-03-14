<?php

namespace Mateusjatenee\Breadcumb;

use Illuminate\Support\Collection;

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

        $this->drivers->push([
            $name => $breadcumb,
        ]);

        return $this;
    }

    public function getDrivers()
    {
        return $this->drivers;
    }
}
