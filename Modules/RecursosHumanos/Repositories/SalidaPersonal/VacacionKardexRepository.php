<?php

namespace Modules\RecursosHumanos\Repositories\SalidaPersonal;

use Modules\RecursosHumanos\Entities\SalidaPersonal\VacacionKardex;

class VacacionKardexRepository
{
    private $_model;

    public function __construct(VacacionKardex $model)
    {
        $this->_model = $model;
    }

    public function find($id)
    {
        return $this->_model->find($id);
    }

    public function acumByCarnet($carnet)
    {
        return $this->_model
            ->selectRaw('SUM(ASIGNADA - TOMADA) AS SALDO')
            ->where('CARNET', $carnet)
            ->first();
    }

    public function store($validated)
    {
        $this->_model->create($validated);
    }

    public function delete($id)
    {
        $this->find($id)->delete();
    }

    public function deleteByVacacion($idVacacion1)
    {
        if ($idVacacion1 > 0) {
            $this->_model->where('IDVACACION1', $idVacacion1)->delete();
        }
    }
}
