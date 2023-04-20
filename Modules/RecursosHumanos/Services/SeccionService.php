<?php

namespace Modules\RecursosHumanos\Services;

use Modules\RecursosHumanos\Repositories\SeccionRepository;

class SeccionService
{
    private $repository;

    public function __construct(SeccionRepository $repository)
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
    public function like($seccion)
    {
        $personal = [];
        if (!empty($seccion)) {
            $data =  $this->repository->like($seccion);
            if (count($data) > 0) {
                foreach ($data as $value) {
                    $personal[] = array(
                        "id" => $value->id,
                        "text" =>  $value->DESCRIPCION,
                    );
                }
            }
        }
        return $personal;
    }
    public function getDescripcionById($id)
    {
        $seccion = $this->repository->find($id)->DESCRIPCION;
        return $seccion;
    }

}
