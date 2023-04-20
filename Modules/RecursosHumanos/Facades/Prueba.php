<?php

namespace Modules\RecursosHumanos\Facades;

use Illuminate\Support\Facades\Facade;

class Prueba extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'rrhh_prueba';
    }
}
