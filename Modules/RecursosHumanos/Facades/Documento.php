<?php

namespace Modules\RecursosHumanos\Facades;

use Illuminate\Support\Facades\Facade;

class Documento extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'rrhh_documento';
    }
}
