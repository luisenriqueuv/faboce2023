<?php

namespace Modules\RecursosHumanos\Observers;

use Modules\RecursosHumanos\Entities\Descanso;

class DescansoObserver
{
    public function creating(Descanso $prueba)
    {
        $prueba->CREATED_ID = auth()->user()->id;
    }

    public function updating(Descanso $prueba)
    {
        $prueba->UPDATED_ID = auth()->user()->id;
    }

    public function deleting(Descanso $prueba)
    {
        $prueba->DELETED_ID = auth()->user()->id;
        $prueba->save();
    }
}