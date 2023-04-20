<?php

namespace Modules\RecursosHumanos\Facades\SalidaPersonal;

use Illuminate\Support\Facades\Facade;

class Vacacion extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'rrhh_vacacion';
    }
}
