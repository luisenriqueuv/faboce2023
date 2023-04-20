<?php

namespace Modules\RecursosHumanos\Repositories\SalidaPersonal;

use Modules\RecursosHumanos\Entities\SalidaPersonal\Vacacion;

class VacacionRepository
{
    private $_model;

    public function __construct(Vacacion $model)
    {
        $this->_model = $model;
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
            ->orderBy('FECHA', 'DESC')
            ->orderBy('ID', 'DESC')
            ->get();
    }

    public function find($id)
    {
        return $this->_model->withTrashed()->find($id);
    }

    public function show($id)
    {
        return $this->_model
            ->withTrashed()
            ->with([
                'vacacion1' => function ($query) {
                    $query->select('ID', 'IDVACACION', 'FECHAI', 'FECHAF', 'HORAI1', 'HORAI2', 'HORAF1', 'HORAF2', 'DIAS', 'FECHARETORNO', 'MEDIODIAI', 'MEDIODIAF');
                },
                'kardex' => function ($query) {
                    $query->select('CARNET')->selectRaw('SUM(ASIGNADA - TOMADA) AS SALDO')->groupBy('CARNET');
                },
                'personal' => function ($query) {
                    $query->select('CARNET', 'NOMBRE', 'APELLIDO');
                },
                'agencia' => function ($query) {
                    $query->select('AGECODIGO', 'AGENOMBRE');
                }
            ])
            ->find($id);
    }

    public function pdf($id)
    {
        return $this->_model->withTrashed()->with('vacacion1')->find($id);
    }

    public function count($id)
    {
        return $this->_model->withTrashed()->where('ID', 'like', $id . '%')->count();
    }

    public function store($validated)
    {
        $this->_model->create($validated);
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
