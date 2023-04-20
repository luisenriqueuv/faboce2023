<?php

namespace Modules\RecursosHumanos\Facades;

use Illuminate\Support\Facades\Facade;

class Area extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'area';
    }
}