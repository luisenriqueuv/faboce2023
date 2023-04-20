<?php

namespace Modules\RecursosHumanos\Observers;

use Carbon\Carbon;
use Modules\RecursosHumanos\Entities\Seccion;

class SeccionObserver
{
    public function creating(Seccion $seccion)
    {
        $seccion->created_id = auth()->user()->id;
    }

    public function updating(Seccion $seccion)
    {
        $seccion->updated_id = auth()->user()->id;
    }

    public function deleting(Seccion $seccion)
    {
        $seccion->deleted_id = auth()->user()->id;
        $seccion->restored_id = 0;
        $seccion->restored_at = null;
        $seccion->save();
    }

    public function restoring(Seccion $seccion)
    {
        $seccion->deleted_id = 0;
        $seccion->restored_id = auth()->user()->id;
        $seccion->restored_at = Carbon::now();
        $seccion->save();
    }
}
