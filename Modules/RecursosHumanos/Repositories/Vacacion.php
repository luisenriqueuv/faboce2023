<?php

namespace Modules\RecursosHumanos\Repositories;

use Modules\Sistemas\Facades\Conexion;
use Modules\RecursosHumanos\Entities\Vacacion as model;

class Vacacion
{
    private $_model;

    public function __construct(model $model)
    {
        $this->_model = $model;
    }

    public function allByDocument($documentos)
    {
        $con = Conexion::get_connection_by_type('SISFAB');
        return $this->_model->on($con)->withTrashed()
            ->whereIn('IDDOCUMENTO', $documentos)
            ->orderBy('FECHA', 'DESC')
            ->orderBy('ID', 'DESC')
            ->get();
    }

    public function find($id)
    {
        $con = Conexion::get_connection_by_type('SISFAB');
        return $this->_model->on($con)->withTrashed()->find($id);
    }

    public function show($id)
    {
        $con = Conexion::get_connection_by_type('SISFAB');
        return $this->_model->on($con)->withTrashed()->with(['vacacion1', 'personal'])->find($id);
    }

    public function count($id)
    {
        $con = Conexion::get_connection_by_type('SISFAB');
        return $this->_model->on($con)->withTrashed()->where('ID', 'like', $id . '%')->count();
    }

    public function store($validated)
    {
        $con = Conexion::get_connection_by_type('SISFAB');
        $this->_model->on($con)->create($validated);
    }

    public function update($validated, $id)
    {
        $this->find($id)->update($validated);
    }

    public function delete($id)
    {
        $this->find($id)->delete();
    }
}
