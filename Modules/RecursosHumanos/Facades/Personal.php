<?php

namespace Modules\RecursosHumanos\Facades;

use Illuminate\Support\Facades\Facade;

class Personal extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'personal';
    }
}