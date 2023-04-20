<?php
// ----------------------------------------------
//              OBSERVER (FORMULARIO)
// ----------------------------------------------

namespace Modules\RecursosHumanos\Observers;

use Carbon\Carbon;
use Modules\RecursosHumanos\Entities\Formulario;

class FormularioObserver
{
    public function creating(Formulario $formulario)
    {
        $formulario->created_id = auth()->user()->id;
    }

    public function updating(Formulario $formulario)
    {
        $formulario->updated_id = auth()->user()->id;
    }

    public function deleting(Formulario $formulario)
    {
        $formulario->deleted_id = auth()->user()->id;
        $formulario->restored_id = 0;
        $formulario->restored_at = null;
        $formulario->save();
    }

    public function restoring(Formulario $formulario)
    {
        $formulario->deleted_id = 0;
        $formulario->restored_id = auth()->user()->id;
        $formulario->restored_at = Carbon::now();
        $formulario->save();
    }
}
