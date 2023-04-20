<?php

namespace Modules\RecursosHumanos\Facades;

use Illuminate\Support\Facades\Facade;

class Vacacioncalculo extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'rrhh_vacaciones_personal';
    }
}