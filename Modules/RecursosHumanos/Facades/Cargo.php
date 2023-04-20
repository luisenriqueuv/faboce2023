<?php

namespace Modules\RecursosHumanos\Facades;

use Illuminate\Support\Facades\Facade;

class Cargo extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'cargo';
    }
}
