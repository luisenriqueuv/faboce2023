<?php

namespace App\Repositories\Sistemas;

use App\Models\Sistemas\Conexion;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;

class ConexionRepository extends BaseRepository
{
    protected $model;

    public function __construct(Conexion $conexion)
    {
        $this->model = $conexion;
    }

    public function get_conexion_by_name($name)
    {
        return $this->where('NAME_CONNECTION', $name)->first();
    }

    public function all_conexion_by_tipo($tipo)
    {
        return $this
            ->join('sis_conexion_user', 'sis_conexion_user.id_conexion', 'sis_conexion.ID')
            ->where('sis_conexion.TIPO', $tipo)
            ->where('sis_conexion_user.id_user', Auth::user()->id)
            ->all();
    }

    public function get_conexion_by_tipo($tipo)
    {
        return $this
            ->join('sis_conexion_user', 'sis_conexion_user.id_conexion', 'sis_conexion.ID')
            ->where('sis_conexion.TIPO', $tipo)
            ->where('sis_conexion_user.id_user', Auth::user()->id)
            ->first();
    }
}
