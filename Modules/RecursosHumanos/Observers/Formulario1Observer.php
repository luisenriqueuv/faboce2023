<?php

// ----------------------------------------------
//              OBSERVER (FORMULARIO 1)
// ----------------------------------------------

namespace Modules\RecursosHumanos\Observers;

use Carbon\Carbon;
use Modules\RecursosHumanos\Entities\Formulario1;

class Formulario1Observer
{
    public function creating(Formulario1 $formulario1)
    {
        $formulario1->created_id = auth()->user()->id;
    }

    public function updating(Formulario1 $formulario1)
    {
        $formulario1->updated_id = auth()->user()->id;
    }

    public function deleting(Formulario1 $formulario1)
    {
        $formulario1->deleted_id = auth()->user()->id;
        $formulario1->restored_id = 0;
        $formulario1->restored_at = null;
        $formulario1->save();
    }

    public function restoring(Formulario1 $formulario1)
    {
        $formulario1->deleted_id = 0;
        $formulario1->restored_id = auth()->user()->id;
        $formulario1->restored_at = Carbon::now();
        $formulario1->save();
    }
}
