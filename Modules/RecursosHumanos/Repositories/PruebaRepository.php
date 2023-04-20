<?php

namespace Modules\RecursosHumanos\Repositories;

use Modules\RecursosHumanos\Entities\Prueba;

class PruebaRepository
{
    private $_model;
    private $_db;

    public function __construct(Prueba $model)
    {
        $this->_model = $model;
        $this->_db = config("app.consolidado");
    }

    public function all()
    {
        return $this->_model->on($this->_db)
            ->withTrashed()
            ->orderBy('DETALLE', 'ASC')
            ->get(['ID', 'DETALLE', 'DELETED_ID', 'DETALLE_1']);
    }

    public function find($id)
    {
        return $this->_model->on($this->_db)->find($id, ['ID', 'DETALLE', 'DETALLE_1','ID']);
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