<?php

namespace Modules\RecursosHumanos\Observers;

use Carbon\Carbon;
use Modules\RecursosHumanos\Entities\Cargo;

class CargoObserver
{
    public function creating(Cargo $cargo)
    {
        $cargo->created_id = auth()->user()->id;
    }

    public function updating(Cargo $cargo)
    {
        $cargo->updated_id = auth()->user()->id;
    }

    public function deleting(Cargo $cargo)
    {
        $cargo->deleted_id = auth()->user()->id;
        $cargo->restored_id = 0;
        $cargo->restored_at = null;
        $cargo->save();
    }

    public function restoring(Cargo $cargo)
    {
        $cargo->deleted_id = 0;
        $cargo->restored_id = auth()->user()->id;
        $cargo->restored_at = Carbon::now();
        $cargo->save();
    }
}
