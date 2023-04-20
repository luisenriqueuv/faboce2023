<?php

namespace Modules\RecursosHumanos\Services\SalidaPersonal;

use Modules\RecursosHumanos\Facades\SalidaPersonal\Vacacion;
use Modules\RecursosHumanos\Facades\SalidaPersonal\VacacionKardex;
use Modules\RecursosHumanos\Repositories\SalidaPersonal\Vacacion1Repository;

class Vacacion1Service
{
    private $_repository;

    public function __construct(Vacacion1Repository $repository)
    {
        $this->_repository = $repository;
    }

    public function find($id)
    {
        return $this->_repository->find($id);
    }

    public function store($validated)
    {
        $vacacion = Vacacion::find($validated['IDVACACION']);
        if ($vacacion) {
            $validated['AGECODIGO'] = $vacacion->AGECODIGO;
            $validated['CARNET']    = $vacacion->CARNET;
            $validated['FECHA']     = $vacacion->FECHA;
            $response = $this->_repository->store($validated);
            VacacionKardex::store([
                'IDVACACION'    => $validated['IDVACACION'],
                'IDVACACION1'   => $response->ID,
                'CARNET'        => $vacacion->CARNET,
                'FECHA'         => $vacacion->FECHA,
                'AGECODIGO'     => $vacacion->AGECODIGO,
                'ASIGNADA'      => 0,
                'TOMADA'        => $response->DIAS,
                'FECHARETORNO'  => $response->FECHARETORNO,
                'OBSERVACION'   => $response->OBSERVACION,
                'SECCION'       => $response->SECCION,
            ]);
            return true;
        } else {
            return false;
        }
    }

    public function update($validated, $id)
    {
        $this->_repository->update($validated, $id);
    }

    public function delete($id)
    {
        VacacionKardex::deleteByVacacion($id);
        $this->_repository->delete($id);
    }
}
