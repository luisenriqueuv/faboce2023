<?php

// ----------------------------------------------
//              SERVICE (FORMULARIO 1)
// ----------------------------------------------

namespace Modules\RecursosHumanos\Services;

use Modules\RecursosHumanos\Repositories\Formulario1Repository;

class Formulario1Service
{
    private $repository;

    public function __construct(Formulario1Repository $repository)
    {
        $this->repository = $repository;
    }   
    
    // all(idFormullario)
    public function all($idFormulario)
    {
        return $this->repository->all($idFormulario);
    }
    
    // find(id)
    public function find($id)
    {
        return $this->repository->find($id);
    }

    // store(datos)
    public function store($validated)
    {
        $this->repository->store($validated);
    }

    // update(datos,id)
    public function update($validated, $id)
    {
        $this->repository->update($validated, $id);
    }

    // delete(id)
    public function delete($id)
    {
        $this->repository->delete($id);
    }

    // restore(id)
    public function restore($id)
    {
        $this->repository->restore($id);
    }
}
