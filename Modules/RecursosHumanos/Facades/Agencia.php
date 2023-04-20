<?php

namespace Modules\RecursosHumanos\Facades;

use Illuminate\Support\Facades\Facade;

class agencia extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'rrhh_agencia';
    }
}
