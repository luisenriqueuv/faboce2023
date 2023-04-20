<?php

namespace Modules\RecursosHumanos\Observers\SalidaPersonal;

use Modules\RecursosHumanos\Entities\SalidaPersonal\VacacionKardex;

class VacacionKardexObserver
{
    public function creating(VacacionKardex $vacacionkardex)
    {
        $vacacionkardex->CREATED_ID = auth()->user()->id;
    }

    public function updating(VacacionKardex $vacacionkardex)
    {
        $vacacionkardex->UPDATED_ID = auth()->user()->id;
    }
}
