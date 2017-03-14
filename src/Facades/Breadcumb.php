<?php

namespace Mateusjatenee\Breadcumb\Facades;

use Illuminate\Support\Facades\Facade;

class Breadcumb extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'breadcumbGenerator';
    }
}
