<?php

namespace Modules\RecursosHumanos\Repositories;

use Modules\RecursosHumanos\Entities\Formulario;

class FormularioRepository
{
    private $_model;
    private $_db;

    public function __construct(Formulario $model)
    {
        $this->_model = $model;
        $this->_db = config("app.consolidado");
    }

    public function all($withTrashed)
    {
        return $withTrashed ?
            $this->_model->on($this->_db)->withTrashed()
            ->with([
                'formulario1' => function ($query) {
                    $query->select('ID', 'NOMBRE', 'IDFORMULARIO')->withTrashed();
                }
            ])->orderBy('ID')->get() :
            $this->_model->on($this->_db)
            ->with([
                'formulario1' => function ($query) {
                    $query->select('ID', 'NOMBRE', 'IDFORMULARIO');
                }
            ])->orderBy('ID')->get();
    }

    public function find($id)
    {
        return $this->_model->on($this->_db)->withTrashed()
            ->with([
                'formulario1' => function ($query) {
                    $query->select('ID', 'NOMBRE', 'IDFORMULARIO')->withTrashed();
                }
            ])
            ->find($id, ['ID', 'CODIGO', 'NOMBRE', 'DESCRIPCION']);
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
