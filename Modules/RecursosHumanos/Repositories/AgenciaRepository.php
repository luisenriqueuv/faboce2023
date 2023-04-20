<?php

namespace Modules\RecursosHumanos\Repositories;

use Modules\RecursosHumanos\Entities\Agencia;

class AgenciaRepository
{
    private $_model;
    private $_db;

    public function __construct(Agencia $model)
    {
        $this->_model = $model;
        $this->_db = config("app.consolidado");
    }

    public function all()
    {
        return $this->_model->on($this->_db)->get(['AGECODIGO', 'AGENOMBRE']);
    }

    public function find($agecodigo)
    {
        return $this->_model->on($this->_db)->withTrashed()->find($agecodigo);
    }

    public function store($validated)
    {
        $this->_model->on($this->_db)->create($validated);
    }

    public function update($validated, $agecodigo)
    {
        $this->_model->on($this->_db)->find($agecodigo)->update($validated);
    }

    public function delete($agecodigo)
    {
        $this->_model->on($this->_db)->find($agecodigo)->delete();
    }
}
