<?php

namespace Modules\RecursosHumanos\Observers;

use Modules\RecursosHumanos\Entities\Prueba;

class PruebaObserver
{
    public function creating(Prueba $prueba)
    {
        $prueba->CREATED_ID = auth()->user()->id;
    }

    public function updating(Prueba $prueba)
    {
        $prueba->UPDATED_ID = auth()->user()->id;
    }

    public function deleting(Prueba $prueba)
    {
        $prueba->DELETED_ID = auth()->user()->id;
        $prueba->save();
    }
}
