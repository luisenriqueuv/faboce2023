<?php

namespace Modules\RecursosHumanos\Services;

use Modules\RecursosHumanos\Repositories\TiporegistroRepository;

class TiporegistroService
{
    private $repository;

    public function __construct(TiporegistroRepository $repository)
    {
        $this->repository = $repository;
    }

    public function all(
        $withTrashed = false
    ) {
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