<?php

namespace Modules\RecursosHumanos\Facades;

use Illuminate\Support\Facades\Facade;

class Tiporegistro extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'rrhh_tiporegistro';
    }
}