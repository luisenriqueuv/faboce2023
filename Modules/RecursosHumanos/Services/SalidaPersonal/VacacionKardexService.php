<?php

namespace Modules\RecursosHumanos\Services\SalidaPersonal;

use Modules\RecursosHumanos\Repositories\SalidaPersonal\VacacionKardexRepository;

class VacacionKardexService
{
    private $_repository;

    public function __construct(VacacionKardexRepository $repository)
    {
        $this->_repository = $repository;
    }

    public function find($id)
    {
        return $this->_repository->find($id);
    }

    public function acumByCarnet($carnet)
    {
        return $this->_repository->acumByCarnet($carnet);
    }

    public function store($validated)
    {
        $this->_repository->store($validated);
    }

    public function delete($id)
    {
        $this->_repository->delete($id);
    }

    public function deleteByVacacion($idVacacion1)
    {
        $this->_repository->deleteByVacacion($idVacacion1);
    }
}
