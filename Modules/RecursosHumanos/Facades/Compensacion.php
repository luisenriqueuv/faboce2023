<?php

namespace Modules\RecursosHumanos\Facades;

use Illuminate\Support\Facades\Facade;

class Compensacion extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'rrhh_compensacion';
    }
}
