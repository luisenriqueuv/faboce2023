<?php

namespace App\Services\Sistemas;

use Illuminate\Support\Facades\Config;
use App\Repositories\Sistemas\ConexionRepository;

class ConexionService
{
    protected $conexionRepository;

    public function __construct(ConexionRepository $conexionRepository)
    {
        $this->conexionRepository = $conexionRepository;
    }

    public function all_conexion_by_tipo($tipo)
    {
        return $this->conexionRepository->all_conexion_by_tipo($tipo);
    }

    public function get_conexion_by_name($name)
    {
        return $this->conexionRepository->get_conexion_by_name($name);
    }

    public function get_conexion_by_tipo($tipo)
    {
        $response = $this->conexionRepository->get_conexion_by_tipo($tipo);

        $configDb = [
            'driver' => 'mysql',
            'host' => $response->DB_HOST,
            'port' => $response->DB_PORT,
            'database' => $response->DB_DATABASE,
            'username' => $response->DB_USERNAME,
            'password' => $response->DB_PASSWORD,
        ];

        $CONFIG = 'database.connections.' . $response->NAME_CONNECTION;
        Config::set($CONFIG, $configDb);
        return $response->NAME_CONNECTION;
    }

    public function set_conexion_by_name($name)
    {
        $response = $this->get_conexion_by_name($name);
        $configDb = [
            'driver' => 'mysql',
            'host' => $response->DB_HOST,
            'port' => $response->DB_PORT,
            'database' => $response->DB_DATABASE,
            'username' => $response->DB_USERNAME,
            'password' => $response->DB_PASSWORD,
        ];

        $CONFIG = 'database.connections.' . $name;
        Config::set($CONFIG, $configDb);
        return $response->NAME_CONNECTION;
    }

}
