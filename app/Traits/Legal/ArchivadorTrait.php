<?php

namespace App\Traits\Legal;

use App\Models\Legal\Archivador;

trait ArchivadorTrait
{
    public function create_id($gestion)
    {
        $count = Archivador::withTrashed()->where('gestion', $gestion)->count();
        return $count + 1;
    }
}
