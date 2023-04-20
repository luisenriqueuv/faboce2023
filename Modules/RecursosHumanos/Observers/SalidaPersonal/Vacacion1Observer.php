<?php

namespace Modules\RecursosHumanos\Observers\SalidaPersonal;

use Modules\RecursosHumanos\Entities\SalidaPersonal\Vacacion1;

class Vacacion1Observer
{
    public function creating(Vacacion1 $vacacion1)
    {
        $vacacion1->CREATED_ID = auth()->user()->id;
    }

    public function updating(Vacacion1 $vacacion1)
    {
        $vacacion1->UPDATED_ID = auth()->user()->id;
    }
}
