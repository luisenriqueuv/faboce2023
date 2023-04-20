<?php

namespace Modules\RecursosHumanos\Repositories\SalidaPersonal;

use Modules\RecursosHumanos\Entities\SalidaPersonal\Vacacion1;

class Vacacion1Repository
{
    private $_model;

    public function __construct(Vacacion1 $model)
    {
        $this->_model = $model;
    }

    public function find($id)
    {
        return $this->_model->find($id);
    }

    public function store($validated)
    {
        return $this->_model->create($validated);
    }

    public function update($validated, $id)
    {
        $this->find($id)->update($validated);
    }

    public function delete($id)
    {
        $this->_model->where('ID', $id)->delete();
    }
}
