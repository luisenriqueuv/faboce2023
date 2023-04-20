<?php

namespace App\Traits\Sistemas;

use App\User;
use App\Services\Sistemas\Conexion;
use Illuminate\Support\Facades\Auth;

trait ConexionTrait
{
    public function getConnection($tipo)
    {
        $conexion = User::find(Auth::user()->id)->conexiones()->where('TIPO', $tipo)->first();
        $con = new Conexion($conexion->NAME_CONNECTION);
        $con->getConnection();
        return $conexion->NAME_CONNECTION;
    }

    public function getConnectionSisInv($database)
    {
        $con = new Conexion($database);
        $con->getConnection();
    }
    
}
