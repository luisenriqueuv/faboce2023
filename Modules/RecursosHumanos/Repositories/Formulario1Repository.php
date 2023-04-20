<?php

// ----------------------------------------------
//              REPOSITORY (FORMULARIO 1)
// ----------------------------------------------

namespace Modules\RecursosHumanos\Repositories;

use Modules\Sistemas\Facades\Conexion;
use Modules\RecursosHumanos\Entities\Formulario1;

class Formulario1Repository
{
    private $model;

    public function __construct(Formulario1 $model)
    {
        $this->model = $model;
    }
    
    // all(idFormullario)
    public function all($idFormulario)
    {
        $con = Conexion::get_connection_by_type('SISFAB');
        return $this->model->on($con)->where('id_formulario',$idFormulario)->get();        
    }
    

    // find(id)
    public function find($id)
    {
        $con = Conexion::get_connection_by_type('SISFAB');
        return $this->model->on($con)->withTrashed()->find($id, ['id','nombre','id_formulario', 'deleted_id', 'restored_id']);
    }
    
    // store(datos)
    public function store($validated)
    {
        $con = Conexion::get_connection_by_type('SISFAB');
        $this->model->on($con)->create($validated);
    }
    
    // update(datos,id)
    public function update($validated, $id)
    {
        $this->find($id)->update($validated);
    }

    // delete(id)
    public function delete($id)
    {
        $this->find($id)->delete();
    }

    // restore(id)
    public function restore($id)
    {
        $this->find($id)->restore();
    }
}
