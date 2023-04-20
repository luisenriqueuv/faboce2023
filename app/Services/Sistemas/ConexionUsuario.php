<?php

namespace App\Services\Sistemas;

use Illuminate\Support\Facades\Auth;
use App\Models\Sistemas\SisConexionUsuario;

class ConexionUsuario {

    public function get_conexion_by_user(){
        return SisConexionUsuario::select('sis_conexion.NAME_CONNECTION')
            ->join('sis_conexion', 'sis_conexion.ID', '=', 'sis_conexion_user.id_conexion')
            ->where('sis_conexion_user.id_user', Auth::user()->id)
            ->where('sis_conexion.TIPO', 'SISCON')
            ->orderBy('sis_conexion.NAME_CONNECTION', 'ASC')
            ->get();
    }

}