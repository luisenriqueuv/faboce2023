<?php

namespace Modules\RecursosHumanos\Repositories;
use Modules\RecursosHumanos\Entities\Vacacioncalculo;

class VacacioncalculoRepository
{
    private $_model;
    private $_db;

    public function __construct(Vacacioncalculo $model)
    {
        $this->_model = $model;
        $this->_db = config("app.consolidado");
    }

    public function all()
    {
        return $this->_model->on($this->_db)
            ->withTrashed()
            ->orderBy('FECHA_INGRESO', 'ASC')
            ->get(['ID',
            'CARNET',
            'FECHA_INGRESO',
            'FECHA_CALCULO',
            'ANIOS_VACACION',
            'IDFORMULARIO',
            'CREATED_AT',
            'UPDATED_AT',
            'DELETED_AT',
            'DELETED_ID']);
    }

    public function allByDocument($documentos)
    {
        return $this->_model->withTrashed()
            ->with([
                'personal' => function ($query) {
                    $query->select('CARNET', 'NOMBRE', 'APELLIDO');
                }
            ])
            ->whereIn('IDDOCUMENTO', $documentos)
            ->orderBy('ID', 'DESC')
            ->get();
    }
    
    public function show($id)
    {
        $con = config("app.consolidado");
        $valores = $this->_model->on($con)
                        ->where('ID','=',$id)
                        ->get([ 'ID',
                                'CARNET',
                                'FECHA_INGRESO',
                                'FECHA_CALCULO',
                                'ANIOS_VACACION',
                                'IDFORMULARIO',
                                'CREATED_AT',
                                'UPDATED_AT',
                                'DELETED_AT',
                                'DELETED_ID']);
        return $valores;
    }

    public function pdf($id)
    {
        return $this->_model->withTrashed()->with('vacacioncalculo')->find($id);
    }
    
    public function count($id)
    {
        return $this->_model->withTrashed()->where('ID', 'like', $id . '%')->count();
    }

    public function find($id)
    {
        return $this->_model->on($this->_db)->find($id, ['ID','CARNET','FECHA_INGRESO','FECHA_CALCULO','ANIOS_VACACION','IDFORMULARIO','CREATED_AT','UPDATED_AT','DELETED_AT','DELETED_ID']);
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