<?php

namespace Modules\RecursosHumanos\Facades;

use Illuminate\Support\Facades\Facade;

class Seccion extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'rrhh_seccion';
    }
}