<?php

namespace Modules\RecursosHumanos\Repositories;
use Modules\RecursosHumanos\Entities\Compensacion;

class CompensacionRepository
{
    private $_model;
    private $_db;

    public function __construct(Compensacion $model)
    {
        $this->_model = $model;
        $this->_db = config("app.consolidado");
    }

    public function all()
    {
        return $this->_model->on($this->_db)
            ->withTrashed()
            ->orderBy('ID', 'ASC')
            ->get(['ID','CARNET','NOMBRE_COMPLETO','FECHA_SOLICITUD','SECCION','FECHA_INICIO_SOLICITUD','HORA_INICIO_SOLICITUD','FECHA_FIN_SOLICITUD','HORA_FIN_SOLICITUD','TOTAL_DIAS','TOTAL_HORAS','OBSERVACION','DELETED_ID','DELETED_AT']);
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
                                'NOMBRE_COMPLETO',
                                'FECHA_SOLICITUD',
                                'SECCION',
                                'FECHA_INICIO_SOLICITUD',
                                'HORA_INICIO_SOLICITUD',
                                'FECHA_FIN_SOLICITUD',
                                'HORA_FIN_SOLICITUD',
                                'TOTAL_DIAS',
                                'TOTAL_HORAS',
                                'OBSERVACION']);
        return $valores;
    }

    public function pdf($id)
    {
        return $this->_model->withTrashed()->with('compensacion')->find($id);
    }
    
    public function count($id)
    {
        return $this->_model->withTrashed()->where('ID', 'like', $id . '%')->count();
    }

    public function find($id)
    {
        return $this->_model->on($this->_db)->find($id, ['ID','CARNET','NOMBRE_COMPLETO','FECHA_SOLICITUD','SECCION','FECHA_INICIO_SOLICITUD','HORA_INICIO_SOLICITUD','FECHA_FIN_SOLICITUD','HORA_FIN_SOLICITUD','TOTAL_DIAS','TOTAL_HORAS','OBSERVACION','DELETED_ID','DELETED_AT']);
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