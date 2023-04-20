<?php

namespace Modules\RecursosHumanos\Facades\SalidaPersonal;

use Illuminate\Support\Facades\Facade;

class VacacionKardex extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'rrhh_vacacionkardex';
    }
}
