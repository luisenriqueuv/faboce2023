<?php

namespace Modules\RecursosHumanos\Observers;

use Carbon\Carbon;
use Modules\RecursosHumanos\Entities\Area;

class AreaObserver
{
    public function creating(Area $area)
    {
        $area->created_id = auth()->user()->id;
    }

    public function updating(Area $area)
    {
        $area->updated_id = auth()->user()->id;
    }

    public function deleting(Area $area)
    {
        $area->deleted_id = auth()->user()->id;
        $area->restored_id = 0;
        $area->restored_at = null;
        $area->save();
    }

    public function restoring(Area $area)
    {
        $area->deleted_id = 0;
        $area->restored_id = auth()->user()->id;
        $area->restored_at = Carbon::now();
        $area->save();
    }
}
