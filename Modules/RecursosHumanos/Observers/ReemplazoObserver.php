<?php

namespace Modules\RecursosHumanos\Observers;

use Modules\RecursosHumanos\Entities\Reemplazo;

class ReemplazoObserver
{
    public function creating(Reemplazo $reemplazo)
    {
        $reemplazo->CREATED_ID = auth()->user()->id;
    }

    public function updating(Reemplazo $reemplazo)
    {
        $reemplazo->UPDATED_ID = auth()->user()->id;
    }

    public function deleting(Reemplazo $reemplazo)
    {
        $reemplazo->DELETED_ID = auth()->user()->id;
        $reemplazo->save();
    }
}