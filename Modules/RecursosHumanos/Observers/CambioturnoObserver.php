<?php

namespace Modules\RecursosHumanos\Observers;

use Modules\RecursosHumanos\Entities\Cambioturno;

class CambioturnoObserver
{
    public function creating(Cambioturno $cambioturno)
    {
        $cambioturno->CREATED_ID = auth()->user()->id;
    }

    public function updating(Cambioturno $cambioturno)
    {
        $cambioturno->UPDATED_ID = auth()->user()->id;
    }

    public function deleting(Cambioturno $cambioturno)
    {
        $cambioturno->DELETED_ID = auth()->user()->id;
        $cambioturno->save();
    }
}