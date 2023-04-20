<?php

namespace App\Services;

use App\Repositories\BaseRepository;

class BaseService
{
    protected $repository;

    public function __construct(BaseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function setConnection($connection = null)
    {
        $this->repository->setConnection($connection);
    }

    public function all()
    {
        return $this->repository->all();
    }

    public function get($id)
    {
        return $this->repository->get($id);
    }

    public function create($validated)
    {
        $this->repository->create($validated);
    }

    public function update($validated, $id)
    {
        $this->repository->update($validated, $id);
    }

    public function destroy($id)
    {
        $this->repository->destroy($id);
    }

    public function orderBy($column, $direction = 'asc')
    {
        return $this->repository->orderBy($column, $direction);
    }

}
