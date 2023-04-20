<?php

namespace Modules\RecursosHumanos\Observers;

use Carbon\Carbon;
use Modules\RecursosHumanos\Entities\Vacacioncalculo;

class VacacioncalculoObserver
{
    public function creating(Vacacioncalculo $vacacioncalculo)
    {
        $vacacioncalculo->CREATED_ID = auth()->user()->id;
    }

    public function updating(Vacacioncalculo $vacacioncalculo)
    {
        $vacacioncalculo->UPDATED_ID = auth()->user()->id;
    }

    public function deleting(Vacacioncalculo $vacacioncalculo)
    {
        $vacacioncalculo->DELETED_ID = auth()->user()->id;
        $vacacioncalculo->RESTORED_ID = 0;
        $vacacioncalculo->RESTORED_AT = null;
        $vacacioncalculo->save();
    }

    public function restoring(Vacacioncalculo $vacacioncalculo)
    {
        $vacacioncalculo->DELETED_ID = 0;
        $vacacioncalculo->RESTORED_ID = auth()->user()->id;
        $vacacioncalculo->RESTORED_AT = Carbon::now();
        $vacacioncalculo->save();
    }
}
