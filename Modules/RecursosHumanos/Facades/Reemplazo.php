<?php

namespace Modules\RecursosHumanos\Facades;

use Illuminate\Support\Facades\Facade;

class Reemplazo extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'rrhh_reemplazo';
    }
}