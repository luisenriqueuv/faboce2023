<?php

namespace Modules\RecursosHumanos\Observers;

use Carbon\Carbon;
use Modules\RecursosHumanos\Entities\Tiporegistro;

class TiporegistroObserver
{
    public function creating(Tiporegistro $tiporegistro)
    {
        $tiporegistro->created_id = auth()->user()->id;
    }

    public function updating(Tiporegistro $tiporegistro)
    {
        $tiporegistro->updated_id = auth()->user()->id;
    }

    public function deleting(Tiporegistro $tiporegistro)
    {
        $tiporegistro->deleted_id = auth()->user()->id;
        $tiporegistro->restored_id = 0;
        $tiporegistro->restored_at = null;
        $tiporegistro->save();
    }

    public function restoring(Tiporegistro $tiporegistro)
    {
        $tiporegistro->deleted_id = 0;
        $tiporegistro->restored_id = auth()->user()->id;
        $tiporegistro->restored_at = Carbon::now();
        $tiporegistro->save();
    }
}