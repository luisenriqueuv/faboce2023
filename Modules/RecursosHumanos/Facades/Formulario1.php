<?php

// ----------------------------------------------
//              FACADE (FORMULARIO 1) 
// ----------------------------------------------

namespace Modules\RecursosHumanos\Facades;

use Illuminate\Support\Facades\Facade;

class Formulario1 extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'formulario1';
    }
}
