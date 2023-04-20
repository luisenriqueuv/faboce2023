<?php

namespace Modules\RecursosHumanos\Services;

use Modules\RecursosHumanos\Repositories\FormularioRepository;

class FormularioService
{
    private $repository;

    public function __construct(FormularioRepository $repository)
    {
        $this->repository = $repository;
    }

    public function all($withTrashed = false)
    {
        return $this->repository->all($withTrashed);
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
