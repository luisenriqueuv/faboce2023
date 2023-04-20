<?php

namespace Modules\RecursosHumanos\Observers;

use Modules\RecursosHumanos\Entities\Compensacion;

class CompensacionObserver
{
    public function creating(Compensacion $compensacion)
    {
        $compensacion->CREATED_ID = auth()->user()->id;
    }

    public function updating(Compensacion $compensacion)
    {
        $compensacion->UPDATED_ID = auth()->user()->id;
    }

    public function deleting(Compensacion $compensacion)
    {
        $compensacion->DELETED_ID = auth()->user()->id;
        $compensacion->save();
    }
}
