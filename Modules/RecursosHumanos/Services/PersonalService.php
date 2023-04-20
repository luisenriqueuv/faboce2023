<?php

namespace Modules\RecursosHumanos\Services;

use Modules\RecursosHumanos\Repositories\PersonalRepository;

class PersonalService
{
    private $repository;

    public function __construct(PersonalRepository $repository)
    {
        $this->repository = $repository;
    }

    public function all($i = 0)
    {
        return $this->repository->all($i);
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function like($carnet)
    {
        $personal = [];
        if (!empty($carnet)) {
            $data =  $this->repository->like($carnet);
            if (count($data) > 0) {
                foreach ($data as $value) {
                    $personal[] = array(
                        "id" => $value->nombre . ' ' . $value->apellido. ' | ' . $value->carnet,
                        "text" =>  $value->nombre . ' ' . $value->apellido. ' | ' . $value->carnet,
                    );
                }
            }
        }
        return $personal;
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

    public function restore($id)
    {
        $this->repository->restore($id);
    }
}
