<?php

namespace App\Traits\Legal;

use App\Models\Legal\LegDocumento;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

trait DocumentoTrait {

    public function create_id($id_archivador) {
        
        $count = LegDocumento::withTrashed()->where('id', 'like', $id_archivador.'%')->count();
        if ($count < 9) { $id_archivador .= '0'.($count + 1); } 
        else { $id_archivador .= ($count + 1); }    
        return $id_archivador;

    }

    public function downloadPDF($id_documento){
        $documento = LegDocumento::find($id_documento);
        return Storage::download($documento->path, $documento->descripcion);
    }

}