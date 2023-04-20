<?php

namespace Modules\RecursosHumanos\Observers;

use Carbon\Carbon;
use Modules\RecursosHumanos\Entities\Jerarquia;

class JerarquiaObserver
{
    public function creating(Jerarquia $jerarquia)
    {
        $jerarquia->created_id = auth()->user()->id;
    }

    public function updating(Jerarquia $jerarquia)
    {
        $jerarquia->updated_id = auth()->user()->id;
    }

    public function deleting(Jerarquia $jerarquia)
    {
        $jerarquia->deleted_id = auth()->user()->id;
        $jerarquia->restored_id = 0;
        $jerarquia->restored_at = null;
        $jerarquia->save();
    }

    public function restoring(Jerarquia $jerarquia)
    {
        $jerarquia->deleted_id = 0;
        $jerarquia->restored_id = auth()->user()->id;
        $jerarquia->restored_at = Carbon::now();
        $jerarquia->save();
    }
}
