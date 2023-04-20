<?php

namespace Modules\RecursosHumanos\Facades;

use Illuminate\Support\Facades\Facade;

class Cambioturno extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'rrhh_cambio_turno';
    }
}