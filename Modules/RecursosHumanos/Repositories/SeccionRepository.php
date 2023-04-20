<?php

namespace Modules\RecursosHumanos\Repositories;

use Modules\RecursosHumanos\Entities\Seccion;

class SeccionRepository
{
    private $_model;
    private $_db;

    public function __construct(Seccion $model)
    {
        $this->_model = $model;
        $this->_db = config("app.consolidado");
    }

    public function all($withTrashed)
    {
        return $withTrashed ?
            $this->_model->on($this->_db)->withTrashed()->get(['ID', 'CODIGO',  'DESCRIPCION']) :
            $this->_model->on($this->_db)->get(['ID', 'CODIGO',  'DESCRIPCION']);
    }

    public function find($id)
    {
        return $this->_model->on($this->_db)->withTrashed()->find($id);
    }

    public function store($validated)
    {
        $this->_model->on($this->_db)->create($validated);
    }

    public function update($validated, $id)
    {
        $this->_model->on($this->_db)->find($id)->update($validated);
    }

    public function delete($id)
    {
        $this->_model->on($this->_db)->find($id)->delete();
    }

    public function like($data)
    {
        return $this->_model->on($this->_db)
            ->where('descripcion', 'LIKE', '%' . $data . '%')
            ->get(['descripcion']);
    }
}