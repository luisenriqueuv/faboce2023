<?php

namespace App\Services\Sistemas;

use App\Repositories\Sistemas\ConexionUsuarioRepository;

class ConexionUsuarioService
{
    protected $conexionUsuarioRepository;

    public function __construct(ConexionUsuarioRepository $conexionUsuarioRepository)
    {
        $this->conexionUsuarioRepository = $conexionUsuarioRepository;
    }

    public function get_conexion_by_user($tipo)
    {
        return $this->conexionUsuarioRepository->get_conexion_by_user($tipo);
    }
}
