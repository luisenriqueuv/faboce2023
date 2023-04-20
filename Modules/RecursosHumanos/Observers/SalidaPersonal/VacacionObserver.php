<?php

namespace Modules\RecursosHumanos\Observers\SalidaPersonal;

use Modules\RecursosHumanos\Entities\SalidaPersonal\Vacacion;

class VacacionObserver
{
    public function creating(Vacacion $vacacion)
    {
        $vacacion->CREATED_ID = auth()->user()->id;
    }

    public function updating(Vacacion $vacacion)
    {
        $vacacion->UPDATED_ID = auth()->user()->id;
    }

    public function deleting(Vacacion $vacacion)
    {
        $vacacion->DELETED_ID = auth()->user()->id;
        $vacacion->save();
    }
}
