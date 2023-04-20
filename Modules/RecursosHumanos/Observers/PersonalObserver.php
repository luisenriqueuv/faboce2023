<?php

namespace Modules\RecursosHumanos\Observers;

use Carbon\Carbon;
use Modules\RecursosHumanos\Entities\Personal;

class PersonalObserver
{
    public function creating(Personal $personal)
    {
        $personal->CREATED_ID = auth()->user()->id;
    }

    public function updating(Personal $personal)
    {
        $personal->UPDATED_ID = auth()->user()->id;
    }

    public function deleting(Personal $personal)
    {
        $personal->DELETED_ID = auth()->user()->id;
        $personal->RESTORED_ID = 0;
        $personal->RESTORED_AT = null;
        $personal->save();
    }

    public function restoring(Personal $personal)
    {
        $personal->DELETED_ID = 0;
        $personal->RESTORED_ID = auth()->user()->id;
        $personal->RESTORED_AT = Carbon::now();
        $personal->save();
    }
}
