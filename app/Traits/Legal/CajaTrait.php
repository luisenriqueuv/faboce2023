<?php

namespace App\Traits\Legal;

use App\Models\Legal\LegCaja;
use App\Models\Legal\LegGestion;

trait CajaTrait {

    public function create_id($id_gestion) {

        $gestion = LegGestion::find($id_gestion);
        $aux_fecha = strtotime($gestion->fecha_inicial);
        $id_caja = $gestion->inicial.date('Y', $aux_fecha);
        $count = LegCaja::withTrashed()->where('id', 'like', $id_caja.'%')->count();
        if ($count < 9) { $id_caja .= '0'.($count + 1); } 
        else { $id_caja .= ($count + 1); }    
        return $id_caja;

    }

}