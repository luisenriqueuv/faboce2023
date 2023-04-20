<?php

namespace Modules\RecursosHumanos\Services;

use Modules\RecursosHumanos\Repositories\AgenciaRepository;

class AgenciaService
{
    private $repository;

    public function __construct(AgenciaRepository $repository)
    {
        $this->repository = $repository;
    }

    public function all()
    {
        return $this->repository->all();
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function store($validated)
    {
        $this->repository->store($validated);
    }

    public function update($validated, $id)
    {
        $this->repository->update($validated, $id);
    }

    public function delete($id)
    {
        $this->repository->delete($id);
    }
}
