<?php

namespace Modules\RecursosHumanos\Repositories;

use Modules\RecursosHumanos\Entities\Jerarquia;

class JerarquiaRepository
{
    private $_model;
    private $_db;

    public function __construct(Jerarquia $model)
    {
        $this->_model = $model;
        $this->_db = config("app.consolidado");
    }

    public function all($withTrashed)
    {
        return $withTrashed ?
            $this->_model->on($this->_db)->withTrashed()->get(['ID', 'DESCRIPCION']) :
            $this->_model->on($this->_db)->get(['ID', 'DESCRIPCION']);
    }

    public function find($id)
    {
        return $this->_model->on($this->_db)->withTrashed()->find($id, ['ID', 'DESCRIPCION']);
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
}
