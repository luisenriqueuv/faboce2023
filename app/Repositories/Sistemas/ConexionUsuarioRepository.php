<?php

namespace App\Repositories\Sistemas;

use Illuminate\Support\Facades\Auth;
use App\Models\Sistemas\ConexionUsuario;

class ConexionUsuarioRepository 
{
    protected $conexionUsuario;

    public function __construct(ConexionUsuario $conexionUsuario)
    {
        $this->conexionUsuario = $conexionUsuario;
    }

    public function all_conexion_by_user($tipo)
    {
        return $this->conexionUsuario->with([
            'conexion' => function ($query) use($tipo) {
                $query->select('ID', 'NAME_CONNECTION')->where('TIPO', $tipo);
            }
        ])
            ->where('id_user', Auth::user()->id)
            ->get(['id_conexion']);
    }

    public function get_conexion_by_user($tipo)
    {
        return $this->conexionUsuario->with([
            'conexion' => function ($query) use($tipo) {
                $query->select('ID', 'NAME_CONNECTION')->where('TIPO', $tipo);
            }
        ])
            ->where('id_user', Auth::user()->id)
            ->get(['id_conexion']);
    }
}
