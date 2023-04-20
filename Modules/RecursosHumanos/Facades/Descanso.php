<?php

namespace Modules\RecursosHumanos\Facades;

use Illuminate\Support\Facades\Facade;

class Descanso extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'rrhh_descanso';
    }
}