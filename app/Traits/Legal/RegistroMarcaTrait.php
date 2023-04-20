<?php

namespace App\Traits\Legal;

use App\Models\Legal\Documento;
use App\Models\Legal\Registro;

trait RegistroMarcaTrait {

    public function created_id($fecha, $id_documento) {

        $documento = Documento::find($id_documento);
        $aux_fecha = strtotime($fecha);
        $idRegistro = $documento->inicial;
        $idRegistro .= ($documento->id_tipo_registro < 10) ? '0'.$documento->id_tipo_registro : $documento->id_tipo_registro;
        $idRegistro .= date('Y', $aux_fecha).date('m', $aux_fecha);
        $count = Registro::withTrashed()->where('id', 'like', $idRegistro.'%')->count();
        if ($count < 9) { $idRegistro .= '00'.($count + 1); } 
        else {
            if ($count < 99) { $idRegistro .= '0'.($count + 1); } 
            else { $idRegistro .= ($count + 1); }    
        }
        return $idRegistro;

    }

}